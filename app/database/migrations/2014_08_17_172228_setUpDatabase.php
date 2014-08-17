<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetUpDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('email',150)->unique();
			$table->string('password',60);
		});
		
		Schema::create('expenses', function($table){
			$table->increments('id');
			$table->string('name');
			$table->double('amount');
			$table->date('occured_at');
			$table->text('description');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
		
		Schema::dropIfExists('expenses');
	}

}
