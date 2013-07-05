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
	 * @param  string  $format
	 * @return string
	 */
	public function date($format = 'Y/m/d H:i:s')
	{
		return $this->formatDate($this->post->created_at, $format);
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