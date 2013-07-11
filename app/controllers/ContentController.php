<?php namespace Controllers;

use Content\ContentManager;
use Content\ContentRepositoryInterface;

abstract class ContentController extends BaseController {

	/**
	 * The Post Manager.
	 *
	 * @var \Content\ContentManager
	 */
	protected $manager;

	/**
	 * Initialize the Content Controller.
	 *
	 * @param  \Content\ContentManager  $manager
	 * @return void
	 */
	public function __construct(ContentManager $manager)
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
		$items = $this->manager->all();

		return $this->view('content.index', compact('items'));
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