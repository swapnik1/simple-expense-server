<?php

class Expense extends \Eloquent {

	public $table = 'expenses';
	
	protected $fillable = ['name','amount','description'];
	
	public static $rules = [
		'name' => 'required,min:2',
		'amount' => 'required',
		'occured_at' => 'required'
	];
	
	public $errors;
	
	public function user(){
		return $this->belongsTo('User');
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