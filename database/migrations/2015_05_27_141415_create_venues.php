<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenues extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venues', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('slug')->unique();
      $table->string('title');
      $table->string('subtitle')->nullable();
      $table->string('address1')->nullable();
      $table->string('address2')->nullable();
      $table->string('address3')->nullable();
      $table->string('city')->nullable();
      $table->string('state')->nullable();
      $table->string('country')->nullable();
      $table->string('postal_code')->nullable();
      $table->string('phone')->nullable();
      $table->string('url')->nullable();
      $table->string('email')->nullable();
      $table->decimal('latitude', 23, 20)->nullable();
      $table->decimal('longitude', 23, 20)->nullable();
      $table->text('description')->nullable();
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
		Schema::drop('venues');
	}

}
