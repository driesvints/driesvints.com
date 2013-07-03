<?php namespace Models;

class Post extends BaseModel {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * Sets the validation rules on the model.
	 *
	 * @return void
	 */
	protected function setUpValidationRules()
	{
		static::$rules = array(
			'title' => 'required',
			'slug'  => 'required|unique:posts,slug,' . $this->id,
		);
	}

}