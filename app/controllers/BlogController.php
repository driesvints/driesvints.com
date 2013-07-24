<?php

use Content\ContentRepositoryInterface;

class BlogController extends BaseController {

	/**
	 * The page title.
	 *
	 * @var string
	 */
	public $title = 'Blog';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$posts = get_posts()->published()->orderBy('date')->all();

		return $this->view('posts.blog', compact('posts'));
	}

}