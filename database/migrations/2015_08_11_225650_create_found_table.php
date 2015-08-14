<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('found', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('itemcode');
            $table->string('itemname');
            $table->string('description');
            $table->string('founddate');
            $table->string('foundvenue');
            $table->string('cusid');
           $table->string('status');
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
		Schema::drop('found');
	}

}
