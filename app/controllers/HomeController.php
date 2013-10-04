<?php

class HomeController extends BaseController {

	/**
	 * Display the homepage.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$posts = get_posts()
		         ->published()
		         ->orderBy('date', 'desc')
		         ->take(3);

		return $this->view('home', compact('posts'));
	}

}