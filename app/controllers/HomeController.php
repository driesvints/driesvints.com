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
		         ->paginate(10);

		return $this->view('public.home', compact('posts'));
	}

}