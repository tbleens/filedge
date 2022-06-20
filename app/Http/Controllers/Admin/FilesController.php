<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Storage;

class FilesController extends Controller
{
    public function list(Request $request)
    {
        $SearchFileName = ($request->input('file_name') == 'all' ? null : $request->input('file_name'));
        $sort = ($request->input('sort') == 'asc' ? 'asc' : 'desc');

        $uploads = Upload::when($SearchFileName, function ($query) use ($SearchFileName) {
            return $query->searchByFileName($SearchFileName);
        })
                    ->orderBy('id', $sort)
                    ->paginate(20);

        return view('admin.files.list', [
            'uploads' => $uploads
        ]);
    }

    public function showEdit($id)
    {
        $upload = Upload::findOrFail($id);
        return view('admin.files.view', [
            'upload' => $upload
        ]);
    }

    public function download($fileId)
    {
        $file = Upload::where('file_id', $fileId)->firstOrFail();

        $file_id = $file->file_id; // file id
        $file_type = $file->file_type; // file type
        $originalFileName = str_replace('.' . $file_type, '', $file->original_filename); // Original name without extension
        $filename = $originalFileName . '_' . $file_id . '.' . $file_type;
        // check file storage
        if ($file->method == 1) {
            $file_path = "uploads/storage/" . $filename;
            if (file_exists($file_path)) {
                return \Response::download($file_path, $file->original_filename);
            } else {
                // Abort 404
                return abort(404);
            }
        } elseif ($file->method == 3) {
            if (Storage::disk('wasabi')->has($filename)) {
                return redirect(Storage::disk('wasabi')->temporaryUrl($filename, now()->addHour(), ['ResponseContentDisposition' => 'attachment; filename=' . $file->original_filename]));
            }
        }
    }

    public function delete($fileId)
    {
        $upload = Upload::where('file_id', $fileId)->firstOrFail();

        if ($upload->method == 1) {
            $uploadFile = str_replace(url('/') . '/', '', $upload->file_path);
            if (file_exists($uploadFile)) {
                $delete = File::delete($uploadFile);
            }
        } elseif ($upload->method == 2) {
            $path = parse_url($upload->file_path, PHP_URL_PATH);
            if (Storage::disk('s3')->has($path)) {
                // Delete upload from amazon s3
                $delete = Storage::disk('s3')->delete($path);
            }
        } elseif ($upload->method == 3) {
            $path = parse_url($upload->file_path, PHP_URL_PATH);
            if (Storage::disk('wasabi')->has($path)) {
                // Delete upload from wasabi s3
                $delete = Storage::disk('wasabi')->delete($path);
            }
        }

        // Delete from database
        $delete = $upload->delete();
        if ($delete) {
            // success response
            return redirect()->route('files.list')->with(['success' => 'File deleted successfully']);
        }
    }
}
