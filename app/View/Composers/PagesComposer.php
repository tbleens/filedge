<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;

class PagesComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Models\Page
     */
    protected $pages;

    /**
     * Create a new pages composer.
     *
     * @param  \App\Models\Page  $pages
     * @return void
     */
    public function __construct(Page $pages)
    {
        // Dependencies are automatically resolved by the service container...
        $this->pages = $pages;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('composerPages', $this->pages->get());
    }
}
