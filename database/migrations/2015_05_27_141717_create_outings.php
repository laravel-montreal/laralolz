<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outings', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('slug')->unique();
      $table->string('title');
      $table->string('subtitle')->nullable();
      $table->datetime('starts_at');
      $table->datetime('ends_at')->nullable();
      $table->text('description');
      $table->integer('venue_id')->unsigned()->nullable();
      $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade')->onUpdate('cascade');
      $table->integer('administrator_id')->unsigned()->nullable();
      $table->foreign('administrator_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->timestamps();
      $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('outings');
	}

}
