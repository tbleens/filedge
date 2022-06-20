<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Post;

class PagesController extends Controller
{
    public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.index', [
            'page' => $page
        ]);
    }

    /**
     * Show home page
     *
     * @return void
     */
    public function home()
    {
        $posts = Post::take(6)->get();
        return view('pages.welcome', [
            'posts' => $posts
        ]);
    }

    /**
     * Show Privacy Policy page
     *
     * @return void
     */
    public function indexPrivacyPolicy()
    {
        return view('pages.index', [
            'name' => __('Privacy Policy'),
            'content' => config('settings.privacy_policy')
        ]);
    }

    /**
     * Show Terms Service page
     *
     * @return void
     */
    public function indexTermsService()
    {
        return view('pages.index', [
            'name' => __('Terms service'),
            'content' => config('settings.term_service')
        ]);
    }

    public function showFaq()
    {
        $faqs = Faq::where('visibility', 1)->get();
        return view('pages.faq', [
            'faqs' => $faqs
        ]);
    }
}
