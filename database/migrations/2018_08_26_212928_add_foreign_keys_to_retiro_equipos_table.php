<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRetiroEquiposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('retiro_equipos', function(Blueprint $table)
		{
			$table->foreign('tipo_equipo', 'fk_Retiro_Equipos_Dispositivos')->references('tipo_equipo')->on('dispositivos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Cod_establecimiento', 'fk_Retiro_Equipos_establecimientos1')->references('cod_establecimiento')->on('establecimientos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('retiro_equipos', function(Blueprint $table)
		{
			$table->dropForeign('fk_Retiro_Equipos_Dispositivos');
			$table->dropForeign('fk_Retiro_Equipos_establecimientos1');
		});
	}

}
