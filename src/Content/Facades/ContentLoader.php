<?php namespace Dries\Content\Facades;

use Illuminate\Support\Facades\Facade;

class ContentLoader extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'content_loader'; }

}