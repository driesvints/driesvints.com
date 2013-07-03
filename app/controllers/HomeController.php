<?php

use Models\Post;

class HomeController extends BaseController {

	/**
	 * Display the homepage.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$posts = Post::orderBy('created_at', 'desc')->take(5)->get();

		return View::make('index', compact('posts'));
	}

}