<?php

if ( ! function_exists('get_posts'))
{
	/**
	 * Retrieve all of the posts in the application.
	 *
	 * @return array
	 */
	function get_posts()
	{
		$sources = Config::get('content.posts');

		return ContentLoader::get($sources);
	}
}