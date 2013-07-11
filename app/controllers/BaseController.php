<?php namespace Controllers;

use View;
use Controller;

class BaseController extends Controller {

	/**
	 * The page title.
	 *
	 * @var string
	 */
	public $title;

	/**
	 * Create a view and send along default variables.
	 *
	 * @param  string  $view
	 * @param  array   $data
	 * @param  array   $mergeData
	 * @return \Illuminate\View\View
	 */
	public function view($view, $data = array(), $mergeData = array())
	{
		return View::make($view, $data, $mergeData)
			->with('title', $this->title);
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}