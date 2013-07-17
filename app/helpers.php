<?php

/*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
|
| Application helper methods.
|
*/

if ( ! function_exists('get_content'))
{
	/**
	 * Gets content from a content type.
	 *
	 * @param  string  $type
	 * @return \Content\Collection
	 */
	function get_content($type)
	{
		$items = app('content_loader')->config($type);

		return new Content\Collection($items);
	}
}

if ( ! function_exists('get_posts'))
{
	/**
	 * Retrieve all of the posts in the application.
	 *
	 * @return \Content\Collection
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
	 * @return \Content\Collection
	 */
	function get_pages()
	{
		return get_content('pages');
	}
}