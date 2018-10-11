<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('siret', 20)->nullable();
			$table->string('nom');
			$table->string('prenom');
			$table->string('structure');
			$table->string('url');
			$table->string('ville');
			$table->integer('postal');
			$table->string('rue');
			$table->string('telephone');
			$table->string('statut');
			$table->integer('budget');
			$table->integer('etp');
			$table->timestamps();
			$table->integer('users_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('companies');
	}
}