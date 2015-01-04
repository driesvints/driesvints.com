<?php
namespace Dries\Http\Controllers;

use App;
use Dries\Content\Manager;
use View;

class PostsController extends BaseController
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
     * Display all blog posts
     *
     * @return \Illuminate\View\View
     */
    public function blog()
    {
        $posts = $this->content->get('posts')->published()->orderBy('date', 'desc');

        return View::make('blog', compact('posts'));
    }

    /**
     * Display a blog post
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $post = $this->content->get('posts')->published()->filterBy('slug', $slug)->first();

        if (! $post) {
            App::abort(404);
        }

        return View::make('post', compact('post'));
    }
}
