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

        $metaDescription = 'Web Developer with a passion for open-source, community & Laravel. Currently works at BeatSwitch in the city of Antwerp, Belgium.';

		return $this->view('home', compact('posts', 'metaDescription'));
	}

}