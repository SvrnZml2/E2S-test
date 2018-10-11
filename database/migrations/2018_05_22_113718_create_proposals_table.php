<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProposalsTable extends Migration {

	public function up()
	{
		Schema::create('proposals', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('titre');
			$table->string('type');
			$table->string('description');
			$table->integer('companies_id')->unsigned();
			$table->boolean('frequence');
			$table->integer('heure');
			$table->date('debut');
			$table->date('fin');
			$table->integer('sub_skills_id')->unsigned();
			$table->boolean('is_valid');
			$table->date('expiration');
			$table->boolean('besoin');
			$table->integer('cout');
			$table->string('lieu');
			$table->string('materiel');
			$table->integer('deplacement');
			$table->string('service');
		});
	}

	public function down()
	{
		Schema::drop('proposals');
	}
}