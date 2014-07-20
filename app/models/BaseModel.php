<?php
namespace Models;

use Eloquent;
use Validator;

class BaseModel extends Eloquent
{
    /**
     * The validation rules for this model.
     *
     * @var array
     */
    public static $rules = [];

    /**
     * The errors for this model after validation.
     *
     * @var \Illuminate\Support\MessageBag
     */
    public $errors;

    /**
     * Sets the validation rules on the model.
     *
     * @return void
     */
    protected function setUpValidationRules()
    {
    }

    /**
     * Validates a model against its rules.
     *
     * @return bool
     */
    public function validate()
    {
        $this->setUpValidationRules();

        $validator = Validator::make($this->attributes, static::$rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->messages();

        return false;
    }

    /**
     * Returns the errors for this model after validation.
     *
     * @return \Illuminate\Support\MessageBag|null
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
