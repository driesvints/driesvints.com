<?php
namespace Dries\Http\Controllers;

use Dries\Content\Manager;

class PostsController extends Controller
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

        return view('blog', compact('posts'));
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
            abort(404);
        }

        return view('post', compact('post'));
    }
}
