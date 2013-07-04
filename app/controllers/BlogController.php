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
		$posts = Post::all()->all();

		$this->manager->addMultiple($posts);

		$posts = $this->manager->all();

		return View::make('blog.index', compact('posts'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Models\Post  $post
	 * @return \Illuminate\View\View
	 */
	public function show(Post $post)
	{
		return View::make('blog.show', compact('post'));
	}

}