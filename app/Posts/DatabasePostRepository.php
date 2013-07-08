<?php namespace Posts;

use Models\Post;

class DatabasePostRepository extends BasePostRepository implements PostRepositoryInterface {

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
	 * Returns the post date.
	 *
	 * @param  string  $format
	 * @return string
	 */
	public function date($format = 'Y/m/d H:i:s')
	{
		return $this->formatDate($this->getAttribute('created_at'), $format);
	}

	/**
	 * Returns a specific post attribute.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function getAttribute($key)
	{
		return $this->post->getAttribute($key);
	}

	/**
	 * Sets a new value to a specific post attribute.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return mixed
	 */
	public function setAttribute($key, $value)
	{
		$this->post->setAttribute($key, $value);
	}

}