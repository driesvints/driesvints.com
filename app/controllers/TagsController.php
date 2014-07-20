<?php

class TagsController extends BaseController
{
    /**
     * Displays a listing of all the posts with a specific tag.
     *
     * @param string $tag
     * @return \Illuminate\View\View
     */
    public function show($tag)
    {
        $this->title = $tag;

        $posts = get_posts()->published()->filter(
            function ($post) use ($tag) {
                return in_array($tag, $post->tags);
            }
        )->orderBy('date', 'desc');

        return $this->view('tag', compact('tag', 'posts'));
    }
}
