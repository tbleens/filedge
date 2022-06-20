<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index()
    {
        return view('admin.manages_ads.index');
    }

    public function store(Request $request)
    {
        $values['home_top_ads'] = $request->home_top_ads;
        $values['home_bottom_ads'] = $request->home_bottom_ads;
        $values['download_top_ads'] = $request->download_top_ads;
        $values['download_right_ads'] = $request->download_right_ads;
        $values['blog_top_ads'] = $request->blog_top_ads;
        $values['blog_bottom_ads'] = $request->blog_bottom_ads;

        foreach ($values as $key => $value) {
            Settings::where('name', $key)->update([
                'value' => $value
            ]);
        }

        return redirect()->route('ads')->with('success', __('Settings ads saved'));
    }
}
