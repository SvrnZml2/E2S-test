<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagerieTable extends Migration {

	public function up()
	{
		Schema::create('messagerie', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('objet');
			$table->text('message');
			$table->integer('id_user')->unsigned();
			$table->integer('id_dest')->unsigned();
			$table->integer('id_proposal')->nullable()->unsigned();
			$table->boolean('is_view');
			$table->boolean('is_purpose');
		});
	}

	public function down()
	{
		Schema::drop('messagerie');
	}
}