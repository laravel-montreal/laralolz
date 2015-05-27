<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutingUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outing_user', function(Blueprint $table)
		{
			$table->increments('id');
      $table->integer('outing_id')->unsigned()->nullable();
      $table->foreign('outing_id')->references('id')->on('outings')->onDelete('cascade')->onUpdate('cascade');
      $table->integer('user_id')->unsigned()->nullable();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('outing_user');
	}

}
