<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDetalleEquipoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('detalle_equipo', function(Blueprint $table)
		{
			$table->foreign('tipo_equipo', 'fk_Detalle_Equipo_Dispositivos')->references('tipo_equipo')->on('dispositivos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_marca', 'fk_Detalle_Equipo_Marcas')->references('Id_Marca')->on('marcas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('cod_establecimiento', 'fk_Detalle_Equipo_establecimientos')->references('cod_establecimiento')->on('establecimientos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('detalle_equipo', function(Blueprint $table)
		{
			$table->dropForeign('fk_Detalle_Equipo_Dispositivos');
			$table->dropForeign('fk_Detalle_Equipo_Marcas');
			$table->dropForeign('fk_Detalle_Equipo_establecimientos');
		});
	}

}
