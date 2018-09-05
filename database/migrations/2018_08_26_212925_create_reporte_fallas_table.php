<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReporteFallasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reporte_fallas', function(Blueprint $table)
		{
			$table->string('cod_establecimiento', 12);
			$table->dateTime('Fecha_Falla');
			$table->string('tipo_equipo', 5)->index('fk_tipo_equipo_Dispositivos_idx');
			$table->string('Descrip_Falla', 100)->nullable();
			$table->integer('Cantidad')->nullable();
			$table->string('No_Series', 50)->nullable();
			$table->dateTime('Fecha_Solucion')->nullable();
			$table->string('Desc_Solucion', 150)->nullable();
			$table->string('Responsable', 100)->nullable();
			$table->primary(['cod_establecimiento','Fecha_Falla','tipo_equipo']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reporte_fallas');
	}

}
