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
		// Get all the database Posts.
		$dbPosts = Models\Post::all()->all();

		// Get all the static posts.
		$staticPosts = File::files(Config::get('app.static_posts'));

		return array_merge($dbPosts, $staticPosts);
	}
}