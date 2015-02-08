<?php
namespace Dries\Http\Controllers;

use Dries\Content\Manager;

class PagesController extends Controller
{
    /**
     * @var \Dries\Content\Manager
     */
    protected $content;

    /**
     * @param \Dries\Content\Manager $content
     */
    public function __construct(Manager $content)
    {
        $this->content = $content;
    }

    /**
     * Display a static page
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $page = $this->content->get('pages')->published()->filterBy('slug', $slug)->first();

        if (! $page) {
            abort(404);
        }

        return view('page', compact('page'));
    }
}
