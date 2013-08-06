<?php namespace Models;

class Post extends ContentModel {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * The related tags.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function tags()
	{
		return $this->hasMany('Models\\Tag');
	}

	/**
	 * Sets the validation rules on the model.
	 *
	 * @return void
	 */
	protected function setUpValidationRules()
	{
		$statuses = array_keys(static::$statuses);

		static::$rules = array(
			'title' => 'required',
			'slug'  => 'required|unique:posts,slug,' . $this->id,
			'status' => 'in:'.implode(',', $statuses),
		);
	}

}