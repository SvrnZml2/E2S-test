<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesProposalsTable extends Migration {
	
	public function up()
	{
		Schema::create('companies_proposals', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->date('match')->nullable();
			$table->date('confirmation')->nullable();
			$table->integer('companies_id')->unsigned();
			$table->integer('proposals_id')->unsigned();
			$table->string('proposals_titre');
			$table->string('proposals_type');
			$table->text('proposals_description');
			$table->integer('proposals_companies_id')->unsigned();
			$table->boolean('proposals_frequence');
			$table->integer('proposals_heure');
			$table->date('proposals_debut');
			$table->date('proposals_fin');
			$table->integer('proposals_sub_skills');
			$table->integer('proposals_cout');
			$table->string('proposals_lieu');
			$table->text('proposals_materiel')->nullable();;
			$table->integer('proposals_deplacement');
			$table->string('proposals_service')->nullable();;
			$table->date('proposals_expiration');
			$table->string('proposals_besoin')->nullable();;
		});
	}

	public function down()
	{
		Schema::drop('companies_proposals');
	}
}