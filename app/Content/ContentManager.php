<?php namespace Content;

use ErrorException;
use Kurenai\DocumentParser;
use Illuminate\Database\Eloquent\Model;

class ContentManager {

	/**
	 * The currently set content items.
	 *
	 * @var array
	 */
	public $items = array();

	/**
	 * Initialize the content manager instance.
	 *
	 * @param  array  $items
	 * @return void
	 */
	public function __construct(array $items = array())
	{
		$this->items = $this->parseMultiple($items);
	}

	/**
	 * Parses multiple content items into ContentRepositoryInterface instances.
	 *
	 * @param  array  $items
	 * @return array
	 */
	protected function parseMultiple(array $items)
	{
		$content = array();

		foreach ($items as $item)
		{
			$content[] = $this->parse($item);
		}

		return $content;
	}

	/**
	 * Parses a single content item into a ContentRepositoryInterface instance.
	 *
	 * @param  mixed  $item
	 * @return mixed
	 * @throws ErrorException
	 */
	public function parse($item)
	{
		// If it is a Illuminate model.
		if ($item instanceof Model)
		{
			return new DatabaseContentRepository($item);
		}

		// If it is a markdown file.
		if ($this->validateMarkdownFile($item))
		{
			$parser = new DocumentParser;

			return new MarkdownContentRepository($item, $parser);
		}

		throw new ErrorException("Not a valid content type.");
	}

	/**
	 * Validates if a given file is a markdown file.
	 *
	 * @param  mixed  $file
	 * @return bool
	 */
	protected function validateMarkdownFile($file)
	{
		if ( ! is_string($file)) return false;

		if ( ! file_exists($file)) return false;

		if (pathinfo($file, PATHINFO_EXTENSION) === 'md')
		{
			return true;
		}

		return false;
	}

	/**
	 * Adds a single content item to the content manager.
	 *
	 * @param  mixed  $item
	 * @return void
	 */
	public function add($item)
	{
		if (is_array($item)) return $this->addMultiple($item);

		$this->items[] = $this->parse($item);
	}

	/**
	 * Adds an array of items to the content manager.
	 *
	 * @param  array  $items
	 * @return void
	 */
	public function addMultiple(array $items)
	{
		foreach ($items as $item) $this->add($item);
	}

	/**
	 * Returns all the items in the content manager.
	 *
	 * @return array
	 */
	public function all()
	{
		return $this->items;
	}

	/**
	 * Take the first {$limit} items.
	 *
	 * @param  int  $limit
	 * @return array
	 */
	public function take($limit)
	{
		return array_slice($this->items, 0, $limit);
	}

	/**
	 * Tries to find and return a content item by its slug.
	 *
	 * @param  string  $slug
	 * @return \Content\ContentRepositoryInterface
	 */
	public function findBySlug($slug)
	{
		$results = $this->items->filter(function($item) use ($slug)
		{
			return $item->slug === $slug;
		});

		return $results->first();
	}

}