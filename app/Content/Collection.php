<?php namespace Content;

use DateTime;
use Illuminate\Support\Collection as BaseCollection;

class Collection extends BaseCollection {

	/**
	 * Take the first {$limit} items.
	 *
	 * @param  int  $limit
	 * @return \Content\Collection
	 */
	public function take($limit)
	{
		return $this->slice(0, $limit);
	}

	/**
	 * Tries to find and return a content item by a key and a value.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return \Content\Collection
	 */
	public function filterBy($key, $value)
	{
		return $this->filter(function($item) use ($key, $value)
		{
			return $item->$key == $value;
		});
	}

	/**
	 * Orders the content items by a key.
	 *
	 * @param  string  $key
	 * @return \Content\Collection
	 */
	public function orderBy($key)
	{
		return $this->sort(function($a, $b) use ($key)
		{
			if ($a->$key == $b->$key) return 0;

			return ($a->$key < $b->$key) ? 1 : -1;
		});
	}

	/**
	 * Only return content which has already been published.
	 *
	 * @return \Content\Collection
	 */
	public function published()
	{
		return $this->filter(function($item)
		{
			$date = new DateTime($item->date('Y-m-d H:i:s'));

			return (
				$date->getTimestamp() <= time() && 
				$item->status === 'published'
			);
		});
	}

}