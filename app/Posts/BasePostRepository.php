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

	/**
	 * Dynamically retrieve attributes on the post.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function __get($key)
	{
		// If there's a equally named function for this attribute,
		// use that function instead of the getAttribute function.
		if (method_exists($this, $key)) return $this->$key();

		return $this->getAttribute($key);
	}

	/**
	 * Dynamically set attributes on the post.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function __set($key, $value)
	{
		$this->setAttribute($key, $value);
	}

}