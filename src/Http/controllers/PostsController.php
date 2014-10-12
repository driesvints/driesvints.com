<?php
namespace Dries\Http\Controllers;

use Dries\Content\Content;
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
        $this->title = 'Archive';

        $posts = $this->contentManager->get('posts')->published()->orderBy('date', 'desc');

        return $this->view('archive', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Dries\Content\Content $item
     * @return \Illuminate\View\View
     */
    public function show(Content $item)
    {
        $this->title = $item->title;

        return $this->view('single', compact('item'));
    }
}
