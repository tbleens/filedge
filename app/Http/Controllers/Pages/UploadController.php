<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Storage;

class UploadController extends Controller
{
    /**
     * Upload File
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        try {

            // validate uploads
            $validator = \Validator::make($request->all(), [
                'file' => ['required'],
            ]);

            // verified if validate fails
            if ($validator->fails()) {
                // errors array
                $response = array(
                    'type' => 'error',
                    'errors' => $validator->errors()->all(),
                );
                // error response
                return response()->json($response);
            }

            $file = $request->file('file');
            $filenameOr = $file->getClientOriginalName();

            //get original name
            $filenameExtension = $file->getclientoriginalextension();

            // get Original name without extension
            $originalFileName = str_replace('.' . $filenameExtension, '', $filenameOr);

            $filenameGenerator = Str::random(15);

            // get fie size
            $fileSize = $file->getSize();
            $maxFileSize = config('settings.max_file_size');
            $formatMaxFileSize = formatBytes(config('settings.max_file_size'));

            if ($fileSize > $maxFileSize) {
                return response()->json(array(
                    'type' => 'error',
                    'errors' => "Please Your File Should be $formatMaxFileSize or Less",
                ));
            }

            // new file name
            $uploadName = $originalFileName . '_' . $filenameGenerator . '.' . $filenameExtension;

            if (config('settings.storage_uploads') == 1) {
                //upload path
                $path = 'uploads/storage/';
                // if path not exists create it
                if (!File::exists($path)) {
                    File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
                }
                // move file to path
                $upload = $file->move('uploads')->move($path, $uploadName);
                // file name
                $filename = url($path) . '/' . $uploadName;
                // method server host
                $method = 1;
            } elseif (config('settings.storage_uploads') == 2) {
                // Storage file to amazon S3
                $upload = Storage::disk('s3')->put($uploadName, fopen($file, 'r+'));
                // file name
                $filename = Storage::disk('s3')->url($uploadName);
                // method
                $method = 2;
            } elseif (config('settings.storage_uploads') == 3) {
                // Storage file to wasabi
                $upload = Storage::disk('wasabi')->put($uploadName, fopen($file, 'r+'), 'public');
                // file name
                $filename = Storage::disk('wasabi')->url($uploadName);
                // method
                $method = 3;
            }

            //check if upload is uploaded
            if ($upload) {
                // if user auth get user id
                if (Auth::user()) {
                    $userID = Auth::user()->id;
                } else {
                    $userID = null;
                }

                $data = Upload::create([
                    'user_id' => $userID,
                    'original_filename' => $filenameOr,
                    'file_id' => $filenameGenerator,
                    'file_path' => $filename,
                    'file_type' => strtolower($filenameExtension),
                    'file_size' => $fileSize,
                    'method' => $method,
                ]);
            }

            // if image data created
            if ($data) {
                // success array
                $response = array(
                    'type' => 'success',
                    'msg' => 'success',
                    'link' => route('download', $filenameGenerator),
                    'id' => $filenameGenerator,
                );
                // success response
                return response()->json($response);
            }
        } catch (\Exception $e) {
            // error response
            return response()->json(array(
                'type' => 'error',
                'errors' => $e->getMessage(),
            ));
        }

        return response()->json(['success' => 'error']);
    }
}
