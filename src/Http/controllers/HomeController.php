<?php
namespace Dries\Http\Controllers;

use Dries\Content\Manager;

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
     * Display the homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->contentManager->get('posts')->published()->orderBy('date', 'desc')->take(3);

        $metaDescription = 'Web Developer with a passion for open-source, community & Laravel.
            Currently works at BeatSwitch in the city of Antwerp, Belgium.';

        return $this->view('home', compact('posts', 'metaDescription'));
    }
}
