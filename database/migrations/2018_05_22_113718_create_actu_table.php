<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActuTable extends Migration {

	public function up()
	{
		Schema::create('actu', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->integer('categorie')->unsigned();
			$table->string('image');
		});
	}

	public function down()
	{
		Schema::drop('actu');
	}
}