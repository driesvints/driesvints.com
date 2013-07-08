<?php namespace Content;

use Illuminate\Database\Eloquent\Model;

class DatabaseContentRepository extends BaseContentRepository implements ContentRepositoryInterface {

	/**
	 * The Post model.
	 *
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model;

	/**
	 * Initialize the repository.
	 *
	 * @param  \Illuminate\Database\Eloquent\Model  $model
	 * @return void
	 */
	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	/**
	 * Returns the content item date.
	 *
	 * @param  string  $format
	 * @return string
	 */
	public function date($format = 'Y/m/d H:i:s')
	{
		return $this->formatDate($this->getAttribute('created_at'), $format);
	}

	/**
	 * Returns a specific content item attribute.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function getAttribute($key)
	{
		return $this->model->getAttribute($key);
	}

	/**
	 * Sets a new value to a specific content item attribute.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return mixed
	 */
	public function setAttribute($key, $value)
	{
		$this->model->setAttribute($key, $value);
	}

	/**
	 * Returns the model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getModel()
	{
		return $this->model;
	}

}