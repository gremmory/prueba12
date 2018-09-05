<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReporteFallasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reporte_fallas', function(Blueprint $table)
		{
			$table->foreign('cod_establecimiento', 'fk_Reporte_Fallas_establecimientos')->references('cod_establecimiento')->on('establecimientos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('tipo_equipo', 'fk_tipo_equipo_Dispositivos')->references('tipo_equipo')->on('dispositivos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reporte_fallas', function(Blueprint $table)
		{
			$table->dropForeign('fk_Reporte_Fallas_establecimientos');
			$table->dropForeign('fk_tipo_equipo_Dispositivos');
		});
	}

}
