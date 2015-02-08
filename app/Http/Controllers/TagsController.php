<?php
namespace Dries\Http\Controllers;

use Dries\Content\Manager;

class TagsController extends Controller
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
        return redirect()->home();
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

        return view('tag', compact('tag', 'posts'));
    }
}
