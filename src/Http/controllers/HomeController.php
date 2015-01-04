<?php
namespace Dries\Http\Controllers;

use Dries\Content\Manager;
use View;

class HomeController extends BaseController
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
     * Display the homepage
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->contentManager->get('posts')->published()->orderBy('date', 'desc')->take(3);

        return View::make('home', compact('posts'));
    }
}
