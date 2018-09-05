<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->integer('id_usuario', true);
			$table->string('Apellidos', 50)->nullable();
			$table->string('Nombres', 50)->nullable();
			$table->string('CorreoE', 50)->nullable();
			$table->string('Nomusuario', 20)->unique('Nomusuario');
			$table->string('contrasena', 20)->nullable();
			$table->boolean('permite_ver')->nullable();
			$table->boolean('permite_modif')->nullable();
			$table->boolean('permite_agregar')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
