<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Storage;

class FilesController extends Controller
{
    public function list(Request $request)
    {
        // $uploads = Upload::where('user_id', Auth::id())->get();

        $SearchFileName = ($request->input('file_name') == 'all' ? null : $request->input('file_name'));
        $sort = ($request->input('sort') == 'asc' ? 'asc' : 'desc');

        $uploads = Upload::where('user_id', Auth::id())->when($SearchFileName, function ($query) use ($SearchFileName) {
            return $query->searchByFileName($SearchFileName);
        })
        ->orderBy('id', $sort)
        ->get();

        return view('user.files.list', [
            'uploads' => $uploads
        ]);
    }

    /**
     * view upload for user
     *
     * @param  mixed $id
     * @return void
     */
    public function view($id)
    {
        $upload = Upload::where([['user_id', Auth::id()], ['id', $id]])->firstOrFail();
        return view('user.files.view', [
            'upload' => $upload
        ]);
    }


    /**
     * download file for user
     *
     * @param  mixed $fileId
     * @return void
     */
    public function download($fileId)
    {
        $file = Upload::where('file_id', $fileId)->firstOrFail();

        // file id
        $file_id = $file->file_id;
        // file type
        $file_type = $file->file_type;
        $originalFileName = str_replace('.' . $file_type, '', $file->original_filename);
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
        } elseif ($file->method == 2) {
            if (Storage::disk('s3')->has($filename)) {
                return redirect(Storage::disk('s3')->temporaryUrl($filename, now()->addHour(), ['ResponseContentDisposition' => 'attachment; filename=' . $file->original_filename]));
            }
        } elseif ($file->method == 3) {
            if (Storage::disk('wasabi')->has($filename)) {
                return redirect(Storage::disk('wasabi')->temporaryUrl($filename, now()->addHour(), ['ResponseContentDisposition' => 'attachment; filename=' . $file->original_filename]));
            }
        }
    }

    /**
     * delete upload for user
     *
     * @param  mixed $id
     * @return void
     */
    public function delete(Request $request)
    {
        $deleteId = $request->idDelete;
        $upload = Upload::where([['user_id', Auth::id()], ['id', $deleteId]])->firstOrFail();

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
            return redirect()->route('user.files.list')->with(['success' => 'File deleted successfully']);
        }
    }
}
