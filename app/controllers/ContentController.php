<?php namespace Controllers;

use View;
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
	 * Display the specified resource.
	 *
	 * @param  \Content\ContentRepositoryInterface  $item
	 * @return \Illuminate\View\View
	 */
	public function show(ContentRepositoryInterface $item)
	{
		return View::make('content.show', compact('item'));
	}

}