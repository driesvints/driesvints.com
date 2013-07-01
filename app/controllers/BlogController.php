<?php

use Models\Post;

class BlogController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$posts = Post::all();

		return View::make('blog.index', compact('posts'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Models\Post  $post
	 * @return \Illuminate\View\View
	 */
	public function show(Post $post)
	{
		return View::make('blog.show', compact('post'));
	}

}