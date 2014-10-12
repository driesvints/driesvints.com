<?php

use Dries\Content\Manager;

class TagsController extends BaseController
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
     * Page isn't available so redirect to home.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return Redirect::home();
    }

    /**
     * Displays a listing of all the posts with a specific tag.
     *
     * @param string $tag
     * @return \Illuminate\View\View
     */
    public function show($tag)
    {
        $this->title = $tag;

        $posts = $this->contentManager->get('posts')->published()
            ->filter(function ($post) use ($tag) {
                return in_array($tag, $post->tags);
            })->orderBy('date', 'desc');

        return $this->view('tag', compact('tag', 'posts'));
    }
}
