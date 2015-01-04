<?php
namespace Dries\Http\Controllers;

use Dries\Content\Manager;
use Redirect;
use View;

class TagsController extends BaseController
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
     * Page isn't available so redirect to home
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return Redirect::home();
    }

    /**
     * Displays a listing of all the posts with a specific tag
     *
     * @param string $tag
     * @return \Illuminate\View\View
     */
    public function show($tag)
    {
        $posts = $this->content->tagged('posts', $tag);

        return View::make('tag', compact('tag', 'posts'));
    }
}
