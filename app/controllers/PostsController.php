<?php

use Models\Post;
use Dries\Content\ContentRepositoryInterface;

class PostsController extends BaseController {

    /**
     * Display all blog posts in an archive list.
     *
     * @return \Illuminate\View\View
     */
    public function archive()
    {
        $this->title = 'Archive';

        $posts = get_posts()
                 ->published()
                 ->orderBy('date', 'desc');

        return $this->view('archive', compact('posts'));
    }

	/**
	 * Display a list of blog posts.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$posts = Post::paginate(10);

		return View::make('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$statuses = Post::getStatuses();

		return View::make('posts.create', compact('statuses'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store()
	{
		$post = new Post;
		$post->title = Input::get('title');
		$post->slug = Input::get('slug') ?: Str::slug($post->title);
		$post->status = Input::get('status');
		$post->published_at = Input::get('published_at');
		$post->body = Input::get('body');
		$post->disable_comments = Input::get('disable_comments');

		if ( ! $post->validate())
		{
			return Redirect::back()
				->withInput()
				->withErrors($post->getErrors());
		}

		$post->save();

		return Redirect::route('admin.posts.edit', $post->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Dries\Content\ContentRepositoryInterface  $item
	 * @return \Illuminate\View\View
	 */
	public function show(ContentRepositoryInterface $item)
	{
        $this->title = $item->title;

		return $this->view('single', compact('item'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \Models\Post  $post
	 * @return \Illuminate\View\View
	 */
	public function edit(Post $post)
	{
		$statuses = Post::getStatuses();

		return View::make('posts.edit', compact('post', 'statuses'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Models\Post  $post
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Post $post)
	{
		$post->title = Input::get('title');
		$post->slug = Input::get('slug') ?: Str::slug($post->title);
		$post->status = Input::get('status');
		$post->published_at = Input::get('published_at');
		$post->body = Input::get('body');
		$post->disable_comments = Input::get('disable_comments');

		if ( ! $post->validate())
		{
			return Redirect::back()
				->withInput()
				->withErrors($post->getErrors());
		}

		$post->save();

		return Redirect::route('admin.posts.edit', $post->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \Models\Post  $post
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(Post $post)
	{
		$post->delete();

		return Redirect::route('admin.posts.index');
	}

}