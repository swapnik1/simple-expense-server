<?php

class Expense extends \Eloquent {
	
	protected $fillable = ['name','amount','description','created_at','updated_at'];
	
	public static $rules = [
		'name' => 'required,min:2',
		'amount' => 'required'
	];

}