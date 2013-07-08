<?php namespace Models;

class Page extends BaseModel {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';

	/**
	 * Sets the validation rules on the model.
	 *
	 * @return void
	 */
	protected function setUpValidationRules()
	{
		static::$rules = array(
			'title' => 'required',
			'slug'  => 'required|unique:pages,slug,' . $this->id,
		);
	}

}