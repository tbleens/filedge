<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    use Upload;

    //index page - list of Categorys
    public function list()
    {
        $categories = Category::get();
        return view('admin.categories.list', [
            'categories' => $categories
        ]);
    }

    //index page add
    public function showAdd()
    {
        return view('admin.categories.add');
    }

    //index page edit
    public function showEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    //create Category
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $Category = new Category();
        $Category->name = $request->name;
        $Category->save();

        return redirect()->route('categories.list');
    }

    //update Category
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $id = $request->idUpdate;

        $Category = Category::findOrFail($id);
        $Category->name = $request->name;
        $Category->save();

        return redirect()->route('categories.edit', $id)->with('success', 'Your categories has been updated.');
    }

    //delete Category
    public function delete($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();

        return redirect()->route('categories.list')->with('success', 'Your Category has been removed.');
    }
}
