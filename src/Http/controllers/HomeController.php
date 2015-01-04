<?php
namespace Dries\Http\Controllers;

use Dries\Content\Manager;
use View;

class HomeController extends BaseController
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
     * Display the homepage
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->content->get('posts')->published()->orderBy('date', 'desc')->take(3);

        return View::make('home', compact('posts'));
    }
}
