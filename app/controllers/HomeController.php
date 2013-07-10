<?php namespace Controllers;

use View;
use Content\ContentManager;

class HomeController extends BaseController {

	/**
	 * The Content Manager.
	 *
	 * @var \Content\ContentManager
	 */
	protected $manager;

	/**
	 * Initialize the Blog Controller.
	 *
	 * @param  \Content\ContentManager  $manager
	 * @return void
	 */
	public function __construct(ContentManager $manager)
	{
		$this->manager = $manager->add(get_posts());
	}

	/**
	 * Display the homepage.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$posts = $this->manager->take(5);

		return View::make('index', compact('posts'));
	}

}