<?php
namespace Models;

class Page extends ContentModel
{
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
        $statuses = array_keys(static::$statuses);

        static::$rules = [
            'title'  => 'required',
            'slug'   => 'required|unique:pages,slug,' . $this->id,
            'status' => 'in:' . implode(',', $statuses),
        ];
    }
}
