<?php namespace Posts;

interface PostRepositoryInterface {

	/**
	 * Returns a specific post attribute.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function getAttribute($key);

	/**
	 * Sets a new value to a specific post attribute.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return mixed
	 */
	public function setAttribute($key, $value);

}