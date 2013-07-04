<?php namespace Posts;

interface PostRepositoryInterface {

	/**
	 * Returns the post title.
	 *
	 * @return string
	 */
	public function title();

	/**
	 * Returns the post slug.
	 *
	 * @return string
	 */
	public function slug();

	/**
	 * Returns the post date.
	 *
	 * @return string
	 */
	public function date();

	/**
	 * Returns the post body.
	 *
	 * @return string
	 */
	public function body();

}