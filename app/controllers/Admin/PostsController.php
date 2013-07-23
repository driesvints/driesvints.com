<?php namespace Controllers\Admin;

use Str;
use View;
use Input;
use Redirect;
use Models\Post;
use Controllers\BaseController;

class PostsController extends BaseController {

	/**
	 * Display a list of blog posts.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$posts = Post::all();

		return View::make('admin.posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return View::make('admin.posts.create');
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  \Models\Post  $post
	 * @return \Illuminate\View\View
	 */
	public function edit(Post $post)
	{
		return View::make('admin.posts.edit', compact('post'));
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