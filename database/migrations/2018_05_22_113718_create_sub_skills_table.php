<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubSkillsTable extends Migration {

	public function up()
	{
		Schema::create('sub_skills', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nom');
			$table->string('description');
			$table->integer('skills_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('sub_skills');
	}
}