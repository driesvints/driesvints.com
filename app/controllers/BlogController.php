<?php

use Models\Post;

class BlogController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'My latest blog posts.';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Models\Post  $post
	 * @return Response
	 */
	public function show(Post $post)
	{
		return 'A specific blog post.';
	}

}