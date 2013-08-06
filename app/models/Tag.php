<?php namespace Models;

class Tag extends BaseModel {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

	/**
	 * The related post.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function post()
	{
		return $this->belongsTo('Models\\Post');
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
			'title' => 'required|alpha_dash',
			'post_id' => 'required|exists:posts',
		);
	}

}