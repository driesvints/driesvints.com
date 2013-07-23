<?php namespace Controllers;

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
		$posts = get_posts()->orderBy('date')->all();

		return $this->view('content.index')->with('items', $posts);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Content\ContentRepositoryInterface  $item
	 * @return \Illuminate\View\View
	 */
	public function show(ContentRepositoryInterface $item)
	{
		return $this->view('content.show', compact('item'));
	}

}