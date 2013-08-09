<?php namespace Content;

use DateTime;
use Prologue\Support\Collection as BaseCollection;

class Collection extends BaseCollection {

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

	/**
	 * Returns a paginator instance for this collection.
	 *
	 * @param  int  $perPage
	 * @return \Illuminate\Pagination\Paginator
	 */
	public function paginate($perPage)
	{
		$paginator = app('paginator');

		$start = ($paginator->getCurrentPage() - 1) * $perPage;

		$sliced = $this->slice($start, $perPage)->all();

		return $paginator->make($sliced, $this->count(), $perPage);
	}

}