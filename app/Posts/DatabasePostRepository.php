<?php namespace Posts;

use Models\Post;

class DatabasePostRepository implements PostRepositoryInterface {

	/**
	 * The Post Model.
	 *
	 * @var \Models\Post
	 */
	protected $post;

	/**
	 * Initialize the repository.
	 *
	 * @param  \Models\Post  $post
	 * @return void
	 */
	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	/**
	 * Returns the post title.
	 *
	 * @return string
	 */
	public function title()
	{
		return $this->post->title;
	}

	/**
	 * Returns the post slug.
	 *
	 * @return string
	 */
	public function slug()
	{
		return $this->post->slug;
	}

	/**
	 * Returns the post date.
	 *
	 * @return string
	 */
	public function date()
	{
		return $this->post->created_at;
	}

	/**
	 * Returns the post body.
	 *
	 * @return string
	 */
	public function body()
	{
		return $this->post->body;
	}

}