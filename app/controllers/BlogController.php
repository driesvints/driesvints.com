<?php

use Models\Post;
use Posts\PostManager;
use Posts\PostRepositoryInterface;

class BlogController extends BaseController {

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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$this->manager->addMultiple(get_posts());

		$posts = $this->manager->all();

		return View::make('blog.index', compact('posts'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Posts\PostRepositoryInterface  $post
	 * @return \Illuminate\View\View
	 */
	public function show(PostRepositoryInterface $post)
	{
		return View::make('blog.show', compact('post'));
	}

}