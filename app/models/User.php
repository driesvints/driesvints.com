<?php
namespace Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface
{
    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
     * Returns the token for the remember check
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token for the remember check
     *
     * @param string $value
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the remember token field name
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Hashes a password before saving it
     *
     * @param  string $password
     * @return void
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::make($password);
    }

    /**
     * Return the full name for this user
     *
     * @return string
     */
    public function fullname()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    /**
     * Sets the validation rules on the model
     *
     * @return void
     */
    protected function setUpValidationRules()
    {
        static::$rules = [
            'email'      => 'required|email|unique:users,email,' . $this->id,
            'first_name' => 'required',
            'last_name'  => 'required',
        ];
    }
}
