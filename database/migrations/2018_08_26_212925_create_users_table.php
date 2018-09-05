<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id_usuario', true);
			$table->string('Apellidos', 50)->nullable();
			$table->string('Nombres', 50)->nullable();
			$table->string('CorreoE', 50)->nullable();
			$table->string('Nomusuario', 20)->unique('Nomusuario');
			$table->string('contrasena', 60)->nullable();
			$table->string('password', 60);
			$table->boolean('permite_ver')->nullable();
			$table->boolean('permite_modif')->nullable();
			$table->boolean('permite_agregar')->nullable();
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
		Schema::drop('users');
	}

}
