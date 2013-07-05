<?php namespace Posts;

use Models\Post;
use ErrorException;
use Kurenai\DocumentParser;
use Illuminate\Support\Collection;

class PostManager {

	/**
	 * The currently set post instances.
	 *
	 * @var \Illuminate\Support\Collection
	 */
	public $posts;

	/**
	 * Initialize the post manager instance.
	 *
	 * @param  array  $posts
	 * @return void
	 */
	public function __construct(array $posts = null)
	{
		$this->posts = $this->parseMultiple($posts);
	}

	/**
	 * Parses multiple posts into PostRepositoryInterface instances.
	 *
	 * @param  array  $posts
	 * @return \Illuminate\Support\Collection
	 */
	protected function parseMultiple(array $posts = null)
	{
		$items = array();

		if ( ! is_null($posts))
		{
			// Parse each post to an PostRepositoryInterface instance.
			foreach ($posts as $post)
			{
				$items[] = $this->parse($post);
			}
		}

		return new Collection($items);
	}

	/**
	 * Parses a post into a PostRepositoryInterface instance.
	 *
	 * @param  mixed  $post
	 * @return mixed
	 * @throws ErrorException
	 */
	public function parse($post)
	{
		// If it is a Post model.
		if ($post instanceof Post)
		{
			return new DatabasePostRepository($post);
		}

		// If it is a markdown file.
		if ($this->validateMarkdownFile($post))
		{
			$parser = new DocumentParser;

			return new MarkdownPostRepository($post, $parser);
		}

		throw new ErrorException("Not a valid post type.");
	}

	/**
	 * Validates if a given file is a markdown file.
	 *
	 * @param  mixed  $post
	 * @return bool
	 */
	protected function validateMarkdownFile($post)
	{
		if ( ! is_string($post)) return false;

		if ( ! file_exists($post)) return false;

		if (pathinfo($post, PATHINFO_EXTENSION) === 'md')
		{
			return true;
		}

		return false;
	}

	/**
	 * Adds a single post to the post manager.
	 *
	 * @param  mixed  $post
	 * @return void
	 */
	public function add($post)
	{
		if (is_array($post))
		{
			return $this->addMultiple($post);
		}

		$this->posts[] = $this->parse($post);
	}

	/**
	 * Adds an array of posts to the post manager.
	 *
	 * @param  array  $posts
	 * @return void
	 */
	public function addMultiple(array $posts)
	{
		foreach ($posts as $post) $this->add($post);
	}

	/**
	 * Returns all the posts in the postmanager.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function all()
	{
		return $this->posts;
	}

	/**
	 * Tries to find and return a post by its slug.
	 *
	 * @param  string  $slug
	 * @return \Posts\PostRepositoryInterface
	 */
	public function findBySlug($slug)
	{
		$results = $this->posts->filter(function($post) use ($slug)
		{
			return $post->slug() === $slug;
		});

		return $results->first();
	}

}