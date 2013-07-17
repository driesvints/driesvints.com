<?php namespace Controllers;

use Content\ContentRepositoryInterface;

class PagesController extends BaseController {

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