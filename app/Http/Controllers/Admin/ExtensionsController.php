<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extension;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExtensionsController extends Controller
{
    use Upload;

    public function list()
    {
        $extensions = Extension::get();
        return view('admin.extensions.list', [
            'extensions' => $extensions
        ]);
    }

    public function indexAdd()
    {
        return view('admin.extensions.add');
    }

    public function indexEdit($id)
    {
        $extension = Extension::where('id', $id)->firstOrFail();
        return view('admin.extensions.edit', ['extension' => $extension]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'icon' => ['required', 'file'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $this->NothashFile = true;
        $values = $this->saveFile($request, ['icon'], 'icons');

        $extension = new Extension();
        $extension->name = $request->name;
        $extension->file_icon = $values['icon'];
        $extension->save();

        return redirect()->route('extensions.list');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'icon' => ['required', 'file'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $id = $request->idUpdate;
        $this->NothashFile = true;
        $values = $this->saveFile($request, ['icon'], 'icons');

        $extension = Extension::findOrFail($id);

        $extension->name = $request->name;
        $extension->file_icon = $values['icon'];
        $extension->save();

        return redirect()->route('extensions.edit', $id)->with('success', __('update successful'));
    }
}
