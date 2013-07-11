<?php namespace Content;

use ErrorException;
use Kurenai\DocumentParser;
use Illuminate\Support\Collection;

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
	 * @param  mixed  $items
	 * @return void
	 */
	public function __construct($items = array())
	{
		$this->add($items);
	}

	/**
	 * Adds content to the content manager.
	 *
	 * @param  mixed  $items
	 * @return \Content\ContentManager
	 * @throws ErrorException
	 */
	public function add($items)
	{
		$items = (array) $items;

		foreach ($items as $item)
		{
			if ( ! $this->validate($item))
			{
				throw new ErrorException('Item is not a valid instance of ContentRepositoryInterface.');
			}

			$this->items[] = $item;
		}

		return $this;
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
		$items = new Collection($this->items);

		$results = $items->filter(function($item) use ($slug)
		{
			return $item->slug === $slug;
		});

		return $results->first();
	}

	/**
	 * Validates an item as a ContentRepositoryInterface.
	 *
	 * @param  mixed  $item
	 * @return bool
	 */
	public function validate($item)
	{
		return $item instanceof ContentRepositoryInterface;
	}

}