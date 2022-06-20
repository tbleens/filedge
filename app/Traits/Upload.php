<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Upload
{
    protected $NothashFile = false;

    public function saveFile(Request $request, array $fields, $path)
    {
        $data = [];


        foreach ($fields as $field) {
            if ($request->has($field)) {
                // Check if the file exists
                $fileName = $this->NothashFile ? $request->file($field)->getClientOriginalName() : $request->file($field)->hashName();
                $request->file($field)->move(public_path("assets/$path"), $fileName);
                $data[$field] = $fileName;
            }
        }

        return $data;
    }
}
