<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	protected $fillable = array('email','password');
	
	public static $rules = [
		'email' => 'required|email|unique:users',
		'password' => 'required|min:6'
	];
	
	public $errors;
	
	public function expenses(){
		return $this->hasMany('Expense');
	}
	
	public function getAuthPassword(){
		return $this->password;
	}
	
	public function getReminderEmail(){
		return $this->email;
	}
	
	public function isValid(){
		$validation = Validator::make($this->attributes, static::$rules);
		if($validation->passes()){
			return true;
		}
		$this->errors = $validation->messages();
		return false;
	}

}
