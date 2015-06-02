<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conferences', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('location')->nullable();
            $table->datetime('starts_at');
            $table->datetime('ends_at')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('conferences');
	}

}
