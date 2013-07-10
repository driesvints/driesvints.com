<?php namespace Controllers;

use View;

class BlogController extends ContentController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$this->manager->add(get_posts());

		$posts = $this->manager->all();

		return View::make('blog.index', compact('posts'));
	}

}