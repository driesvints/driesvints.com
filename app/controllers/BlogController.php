<?php namespace Controllers;

class BlogController extends ContentController {

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
		$this->manager->add(get_posts());

		return parent::index();
	}

}