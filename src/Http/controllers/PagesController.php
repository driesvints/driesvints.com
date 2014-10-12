<?php
namespace Dries\Http\Controllers;

use App;
use Dries\Content\Manager;

class PagesController extends BaseController
{
    /**
     * @var \Dries\Content\Manager
     */
    protected $contentManager;

    /**
     * @param \Dries\Content\Manager $contentManager
     */
    public function __construct(Manager $contentManager)
    {
        $this->contentManager = $contentManager;
    }

    /**
     * Display a static page
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $page = $this->contentManager->get('pages')->published()->filterBy('slug', $slug)->first();

        if (! $page) {
            App::abort(404);
        }

        $this->pageTitle = $page->title;
        $this->metaDescription = $page->excerpt;

        return $this->view('page', compact('page'));
    }
}
