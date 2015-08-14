<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('losts', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('itemcode');
            $table->string('itemname');
            $table->string('description');
            $table->string('datetime');
            $table->string('cusid');
            $table->string('name');
            $table->string('contact');
            $table->string('email');
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
		Schema::drop('losts');
	}

}
