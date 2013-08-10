<?php

use Models\Post;
use Content\ContentRepositoryInterface;

class PostsController extends BaseController {

	/**
	 * Display a list of blog posts.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$posts = Post::all();

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
	 * @param  \Content\ContentRepositoryInterface  $item
	 * @return \Illuminate\View\View
	 */
	public function show(ContentRepositoryInterface $item)
	{
		$tags = array_map(function($tag)
		{
			return link_to_route('tags.show', $tag, $tag);
		}, $item->tags);
		$tags = implode(', ', $tags);

		return $this->view('single', compact('item', 'tags'));
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