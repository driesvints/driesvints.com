<?php
namespace Dries\Http\Controllers;

use App;
use Dries\Content\Manager;

class PostsController extends BaseController
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
     * Display all blog posts in an archive list.
     *
     * @return \Illuminate\View\View
     */
    public function archive()
    {
        $this->pageTitle = 'Archive';

        $posts = $this->contentManager->get('posts')->published()->orderBy('date', 'desc');

        return $this->view('archive', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $post = $this->contentManager->get('posts')->published()->filterBy('slug', $slug)->first();

        if (! $post) {
            App::abort(404);
        }

        $this->pageTitle = $post->title;

        return $this->view('post', compact('post'));
    }
}
