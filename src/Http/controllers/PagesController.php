<?php
namespace Dries\Http\Controllers;

use App;
use Dries\Content\Manager;
use View;

class PagesController extends BaseController
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
            App::abort(404);
        }

        return View::make('page', compact('page'));
    }
}
