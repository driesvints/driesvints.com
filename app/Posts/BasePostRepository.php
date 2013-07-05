<?php namespace Posts;

use Carbon\Carbon;

abstract class BasePostRepository {

	/**
	 * Returns a formatted date string.
	 *
	 * @param  string  $date
	 * @param  string  $format
	 * @return string
	 */
	protected function formatDate($date, $format)
	{
		$date = new Carbon($date);

		return $date->format($format);
	}

}