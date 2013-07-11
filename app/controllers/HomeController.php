<?php namespace Controllers;

class HomeController extends ContentController {

	/**
	 * Display the homepage.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$this->manager->add(get_posts());

		$posts = $this->manager->take(5);

		return $this->view('index', compact('posts'));
	}

}