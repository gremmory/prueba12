<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetalleEquipoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detalle_equipo', function(Blueprint $table)
		{
			$table->string('cod_establecimiento', 12);
			$table->string('cod_equipo', 20);
			$table->string('tipo_equipo', 5)->index('fk_Detalle_Equipo_Dispositivos_idx');
			$table->string('desc_equipo', 100)->nullable();
			$table->integer('id_marca')->nullable()->index('fk_Detalle_Equipo_Marcas_idx');
			$table->text('series')->nullable();
			$table->integer('cantidad')->nullable();
			$table->string('Observaciones', 100)->nullable();
			$table->primary(['cod_establecimiento','cod_equipo','tipo_equipo']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detalle_equipo');
	}

}
