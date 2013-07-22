<?php namespace Controllers;

class HomeController extends BaseController {

	/**
	 * Display the homepage.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$posts = get_posts();

		$posts = $posts->orderBy('date')->take(5);

		return $this->view('index', compact('posts'));
	}

}