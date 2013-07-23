<?php namespace Content;

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
	 * Tries to find and return a content item by a key and value.
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

}