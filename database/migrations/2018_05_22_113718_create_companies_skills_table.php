<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesSkillsTable extends Migration {

	public function up()
	{
		Schema::create('companies_skills', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('companies_id')->unsigned();
			$table->integer('skills_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('companies_skills');
	}
}