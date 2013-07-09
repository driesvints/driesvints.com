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
		$contentLoader = new Content\ContentLoader(app('files'));

		$sources = Config::get('content.posts');

		return $contentLoader->get($sources);
	}
}