<?php namespace Content;

use Illuminate\Support\Collection as IlluminateCollection;

class Collection extends IlluminateCollection {

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
	 * Sorts the content item by date.
	 *
	 * @return \Content\Collection
	 */
	public function sortByDate()
	{
		return $this->sort(function($a, $b)
		{
			if ($a->date == $b->date) return 0;

			return ($a->date < $b->date) ? 1 : -1;
		});
	}

	/**
	 * Tries to find and return a content item by its slug.
	 *
	 * @param  string  $slug
	 * @return \Content\ContentRepositoryInterface
	 */
	public function findBySlug($slug)
	{
		return $this->filter(function($item) use ($slug)
		{
			return $item->slug === $slug;
		})
		->first();
	}

}