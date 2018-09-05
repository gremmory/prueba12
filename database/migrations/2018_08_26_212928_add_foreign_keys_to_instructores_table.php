<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInstructoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('instructores', function(Blueprint $table)
		{
			$table->foreign('id_jornada', 'fk_Instructores_Jornada')->references('id_jornada')->on('jornadas')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_profesion', 'fk_Instructores_Profesiones')->references('id_prefesion')->on('profesiones')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('cod_establecimiento', 'fk_Instructores_establecimientos')->references('cod_establecimiento')->on('establecimientos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('instructores', function(Blueprint $table)
		{
			$table->dropForeign('fk_Instructores_Jornada');
			$table->dropForeign('fk_Instructores_Profesiones');
			$table->dropForeign('fk_Instructores_establecimientos');
		});
	}

}
