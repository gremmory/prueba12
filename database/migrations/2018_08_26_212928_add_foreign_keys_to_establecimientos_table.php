<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEstablecimientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('establecimientos', function(Blueprint $table)
		{
			$table->foreign('id_fase', 'fk_establecimientos_Fases')->references('Id_Fase')->on('fases')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('cod_depto', 'fk_establecimientos_MUNICIPIOS1')->references('COD_DEPTO')->on('municipios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('cod_nivel', 'fk_establecimientos_niveles')->references('cod_nivel')->on('niveles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('establecimientos', function(Blueprint $table)
		{
			$table->dropForeign('fk_establecimientos_Fases');
			$table->dropForeign('fk_establecimientos_MUNICIPIOS1');
			$table->dropForeign('fk_establecimientos_niveles');
		});
	}

}
