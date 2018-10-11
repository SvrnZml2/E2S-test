<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartenaireTable extends Migration {

	public function up()
	{
		Schema::create('partenaire', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nom');
			$table->string('image');
			$table->string('url');
		});
	}

	public function down()
	{
		Schema::drop('partenaire');
	}
}