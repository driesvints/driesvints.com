<?php namespace Content;

use Str;
use Carbon\Carbon;

abstract class BaseContentRepository {

	/**
	 * The date attribute key.
	 *
	 * @var string
	 */
	protected $dateKey;

	/**
	 * Returns the content item date.
	 *
	 * @param  string  $format
	 * @return string
	 */
	public function date($format = 'Y/m/d H:i:s')
	{
		$date = new Carbon($this->getAttribute($this->dateKey));

		return $date->format($format);
	}

	/**
	 * Returns an excerpt of the page body.
	 *
	 * @param  int  $words
	 * @return string
	 * @todo Remove HTML except b,i,code tags.
	 */
	public function excerpt($words = 50)
	{
		return Str::words($this->body, $words);
	}

	/**
	 * Dynamically retrieve attributes on the content item.
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
	 * Dynamically set attributes on the content item.
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