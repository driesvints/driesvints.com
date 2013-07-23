<?php

use Illuminate\Database\Migrations\Migration;

class CreateCmsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->string('first_name');
			$table->string('last_name');
			$table->timestamps();
		});

		Schema::create('posts', function($table)
		{
			$table->increments('id');
			$table->string('slug')->unique();
			$table->string('title');
			$table->text('body');
			$table->timestamps();
		});

		Schema::create('pages', function($table)
		{
			$table->increments('id');
			$table->string('slug')->unique();
			$table->string('title');
			$table->text('body');
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
		Schema::drop('users');
		Schema::drop('posts');
		Schema::drop('pages');
	}

}