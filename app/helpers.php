<?php

use Content\ContentManager;

/*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
|
| Application helper methods.
|
*/

if ( ! function_exists('content_manager'))
{
	/**
	 * Gets the content manager. Optionally pre-populate with data.
	 *
	 * @param  string  $type
	 * @return array
	 */
	function content_manager($type = null)
	{
		$manager = app('content_manager');

		if ( ! is_null($type))
		{
			$manager->add(get_content($type));
		}

		return $manager;
	}
}

if ( ! function_exists('get_content'))
{
	/**
	 * Gets content from a content type.
	 *
	 * @param  string  $type
	 * @return array
	 */
	function get_content($type)
	{
		return app('content_loader')->config($type);
	}
}

if ( ! function_exists('get_posts'))
{
	/**
	 * Retrieve all of the posts in the application.
	 *
	 * @return array
	 */
	function get_posts()
	{
		return get_content('posts');
	}
}

if ( ! function_exists('get_pages'))
{
	/**
	 * Retrieve all of the pages in the application.
	 *
	 * @return array
	 */
	function get_pages()
	{
		return get_content('pages');
	}
}