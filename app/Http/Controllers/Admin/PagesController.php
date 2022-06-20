<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    //index page - list of page
    public function list()
    {
        $pages = Page::get();
        return view('admin.pages.list', [
            'pages' => $pages
        ]);
    }

    //index page add
    public function showAdd()
    {
        return view('admin.pages.add');
    }

    //index page edit
    public function showEdit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', [
            'page' => $page
        ]);
    }

    //create page
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:100', 'unique:pages'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $page = new Page();
        $page->title = $request->title;
        $page->slug = str_replace(' ', '-', $request->slug);
        $page->content = $request->content;
        $page->save();

        return redirect()->route('pages.list');
    }

    //update page
    public function update(Request $request)
    {
        $id = $request->idUpdate;
        $page = Page::where('id', $id)->firstOrFail();

        if ($page->slug === $request->slug) {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'string', 'max:200'],
                'slug' => ['required', 'string', 'max:100'],
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'string', 'max:200'],
                'slug' => ['required', 'string', 'max:100', 'unique:pages'],
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $page->title = $request->title;
        $page->slug = str_replace(' ', '-', $request->slug);
        $page->content = $request->content;
        $page->save();

        return redirect()->route('pages.edit', $id)->with('success', 'Your page has been updated.');
    }

    //delete page
    public function delete($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('pages.list')->with('success', 'Your pages has been removed.');
    }
}
