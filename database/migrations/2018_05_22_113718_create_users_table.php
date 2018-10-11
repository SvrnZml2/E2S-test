<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('avatar')->default('./uploads/avatars/avatar_utilisateur.png');
            $table->string('email')->unique();
            $table->boolean('type')->default(false);
            $table->boolean('demande')->default(false);
            $table->string('password');
            $table->integer('finabo')->default(0);;
            $table->rememberToken();
            $table->timestamps();
        });
    }

	public function down()
	{
		Schema::drop('users');
	}
}