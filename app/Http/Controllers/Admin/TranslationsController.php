<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TranslationsController extends Controller
{
    public function index()
    {
        $translations = Translation::get();
        return view('admin.translations.index', ['translations' => $translations]);
    }

    public function add()
    {
        return view('admin.translations.add');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'locale' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $locale = $request->locale;

        $sourceFile = "resources/lang/en.json";
        $destinationFile = "resources/lang/$locale.json";

        if (!File::exists(base_path($destinationFile))) {
            File::copy(base_path($sourceFile), base_path($destinationFile));
        }

        $translation = new Translation();
        $translation->name = $request->name;
        $translation->locale = $locale;
        $translation->save();

        return redirect()->route('translations.list')->with('status', __('This translation has been created'));
    }

    public function edit($id)
    {
        $translation = Translation::findOrFail($id);
        $locale = $translation->locale;
        $jsonString = file_get_contents(base_path() . "/resources/lang/$locale.json");
        $translationView = json_decode($jsonString, true);

        return view('admin.translations.edit', [
            'translation' => $translationView,
            'id' => $id,
        ]);
        return view('admin.translations.edit');
    }

    public function update(Request $request, $id)
    {
        $translation = Translation::findOrFail($id);
        $locale = $translation->locale;

        $jsonString = file_get_contents(base_path() . "/resources/lang/$locale.json");
        $translationView = json_decode($jsonString, true);

        $data = [];

        foreach ($translationView as $key => $value) {
            $data[$key] = $request->input(str_replace(' ', '_', $key));
        }

        $newJsonString = json_encode($data);
        file_put_contents(base_path() . "/resources/lang/$locale.json", $newJsonString);

        return redirect()->route('translations.edit', $id)->with('status', __('This translation has been updated'));
    }
}
