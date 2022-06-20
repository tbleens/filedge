<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    use Upload;

    //index page - list of posts
    public function list()
    {
        $posts = Post::get();
        return view('admin.posts.list', [
            'posts' => $posts
        ]);
    }

    //index page add
    public function showAdd()
    {
        $categories = Category::get();
        return view('admin.posts.add', [
            'categories' => $categories
        ]);
    }

    //index page edit
    public function showEdit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::get();
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    //create post
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required'],
            'short_description' => ['required',  'max:200'],
            'image' => ['required', 'image'],
            'content' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $values = $this->saveFile($request, ['image'], 'icons');

        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->short_description = $request->short_description;
        $post->content = $request->content;
        $post->image = $values['image'];

        $post->save();

        return redirect()->route('posts.list');
    }

    //update post
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required'],
            'short_description' => ['required',  'max:200'],
            'image' => ['image'],
            'content' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $id = $request->idUpdate;
        if ($request->has('image')) {
            $values = $this->saveFile($request, ['image'], 'posts');
        }

        $post = Post::where('id', $id)->firstOrFail();
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->short_description = $request->short_description;

        if ($request->has('image')) {
            $post->image = $values['image'];
        }

        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.edit', $id)->with('success', 'Your post has been updated.');
    }

    //delete post
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.list')->with('success', 'Your post has been removed.');
    }
}
