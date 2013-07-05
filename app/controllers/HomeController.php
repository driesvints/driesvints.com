<?php

use Models\Post;
use Posts\PostManager;

class HomeController extends BaseController {

	/**
	 * The Post Manager.
	 *
	 * @var \Posts\PostManager
	 */
	protected $manager;

	/**
	 * Initialize the Blog Controller.
	 *
	 * @param  \Posts\PostManager  $manager
	 * @return void
	 */
	public function __construct(PostManager $manager)
	{
		$this->manager = $manager;
	}

	/**
	 * Display the homepage.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$this->manager->add(get_posts());

		$posts = $this->manager->take(5);

		return View::make('index', compact('posts'));
	}

}