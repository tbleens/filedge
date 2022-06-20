<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showBlog(Request $request)
    {
        $SearchTitleName = ($request->input('title') == 'all' ? null : $request->input('title'));
        $sort = ($request->input('sort') == 'asc' ? 'asc' : 'desc');

        $posts = Post::when($SearchTitleName, function ($query) use ($SearchTitleName) {
            return $query->searchByTitle($SearchTitleName);
        })
            ->orderBy('id', $sort)
            ->get();

        return view('pages.blog', compact('posts'));
    }

    public function view_blog_post($id)
    {
        $post = Post::findOrFail($id);
        Post::where('id', $id)->increment('views', 1);
        $mostPopularPosts = Post::OrderBy('views', 'DESC')->take(3)->get();

        return view('pages.blog-read', [
            'post' => $post,
            'mostPopularPosts' => $mostPopularPosts,
        ]);
    }


    public function readBlog()
    {
        return view('pages.blog-read');
    }
}
