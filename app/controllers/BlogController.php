<?php

use Models\Post;
use Content\ContentManager;
use Content\ContentRepositoryInterface;

class BlogController extends BaseController {

	/**
	 * The Post Manager.
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$posts = $this->manager->all();

		return View::make('blog.index', compact('posts'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Content\ContentRepositoryInterface  $post
	 * @return \Illuminate\View\View
	 */
	public function show(ContentRepositoryInterface $post)
	{
		return View::make('blog.show', compact('post'));
	}

}