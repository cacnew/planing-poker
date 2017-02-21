<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('product_owner_id')->unsigned();
            $table->foreign('product_owner_id')->references('id')->on('users');
            $table->string('name')->unique();
            $table->enum('cards',['standard', 'fibonacci', 't-shirt'])->default('standard');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
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
		Schema::drop('games');
	}

}
