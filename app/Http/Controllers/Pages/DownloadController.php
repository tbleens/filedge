<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Upload;
use Illuminate\Http\Request;
use Session;
use Storage;

class DownloadController extends Controller
{
    /**
     * Show download page
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function download(Request $request, $id)
    {
        $uploadDetails = Upload::where('file_id', $id)->firstOrFail();
        return view('pages.download', [
            'uploadDetails' => $uploadDetails
        ]);
    }

    /**
     * request file for download
     *
     * @param  mixed $fileId
     * @return void
     */
    public function request($fileId)
    {
        // Get file data
        $file = Upload::where('file_id', $fileId)->firstOrFail();
        return response()->json([
            'download_link' => route('download.file', $file->file_id),
        ]);
    }

    /**
     * downloadFile for visiter
     *
     * @param  mixed $fileId
     * @return void
     */
    public function downloadFile($fileId)
    {
        $file = Upload::where('file_id', $fileId)->first();

        $file_id = $file->file_id; // file id
        $file_type = $file->file_type; // file type
        $originalFileName = str_replace('.' . $file_type, '', $file->original_filename); // Original name without extension
        $filename = $originalFileName . '_' . $file_id . '.' . $file_type;
        // check file storage
        if ($file->method == 1) {
            $file_path = "uploads/storage/" . $filename;
            if (file_exists($file_path)) {
                // Session::flush();
                Upload::where('file_id', $file_id)->increment('downloads', 1);

                return \Response::download($file_path, $file->original_filename);
            } else {
                // Abort 404
                return abort(404);
            }
        } elseif ($file->method == 2) {
            if (Storage::disk('s3')->has($filename)) {
                // Session::flush();
                $update_downloads = Upload::where('file_id', $file_id)->increment('downloads', 1);
                return redirect(Storage::disk('s3')->temporaryUrl($filename, now()->addHour(), ['ResponseContentDisposition' => 'attachment; filename=' . $file->original_filename]));
            }
        } elseif ($file->method == 3) {
            if (Storage::disk('wasabi')->has($filename)) {
                // Session::flush();
                $update_downloads = Upload::where('file_id', $file_id)->increment('downloads', 1);
                return redirect(Storage::disk('wasabi')->temporaryUrl($filename, now()->addHour(), ['ResponseContentDisposition' => 'attachment; filename=' . $file->original_filename]));
            }
        }
    }


    /**
     * add Report for download file
     *
     * @param  mixed $request
     * @return void
     */
    public function addReport(Request $request)
    {
        Upload::where('file_id', $request->file_id)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'reason' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $report = new Report();
        $report->file_id = $request->file_id;
        $report->reason = $request->reason;
        $report->save();

        return redirect()->route('download', $request->file_id)->with('success', 'Thank you, your report has been sent.');
    }
}
