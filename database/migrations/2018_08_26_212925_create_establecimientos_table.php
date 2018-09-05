<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstablecimientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('establecimientos', function(Blueprint $table)
		{
			$table->string('cod_establecimiento', 12)->primary();
			$table->string('cod_depto', 5)->nullable()->index('fk_establecimientos_cod_depto_idx');
			$table->string('cod_mupio', 5)->nullable()->index('fk_establecimiento_MUNICIPIOS_idx');
			$table->string('ESTABLECIMIENTO', 100)->nullable();
			$table->string('cod_nivel', 5)->nullable()->index('fk_establecimientos_niveles_idx');
			$table->string('DIRECCION', 300)->nullable();
			$table->string('TELEFONO', 12)->nullable();
			$table->string('SECTOR', 20)->nullable();
			$table->string('AREA', 20)->nullable();
			$table->string('JORNADA', 15)->nullable();
			$table->string('DIRECTOR', 65)->nullable();
			$table->integer('ALUMNOS')->nullable();
			$table->integer('ALUMNAS')->nullable();
			$table->integer('TOTAL')->nullable();
			$table->float('MAESTROS', 10, 0)->nullable();
			$table->integer('MULTIGRADO')->nullable();
			$table->string('Junto o Coeduca', 35)->nullable();
			$table->integer('id_fase')->nullable()->index('fk_establecimientos_Fases_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('establecimientos');
	}

}
