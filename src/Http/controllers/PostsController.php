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
     * Display all blog posts
     *
     * @return \Illuminate\View\View
     */
    public function blog()
    {
        $this->pageTitle = 'Blog';

        $posts = $this->contentManager->get('posts')->published()->orderBy('date', 'desc');

        return $this->view('blog', compact('posts'));
    }

    /**
     * Display a blog post
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
        $this->metaDescription = $post->excerpt;

        return $this->view('post', compact('post'));
    }
}
