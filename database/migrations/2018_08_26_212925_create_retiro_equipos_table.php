<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRetiroEquiposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('retiro_equipos', function(Blueprint $table)
		{
			$table->string('Cod_establecimiento', 12)->index('fk_Retiro_Equipos_establecimientos1');
			$table->dateTime('Fecha_Retiro');
			$table->string('tipo_equipo', 5)->index('fk_Retiro_Equipos_Dispositivos_idx');
			$table->text('Descrip_Retiro')->nullable();
			$table->string('No_Serie', 30)->nullable();
			$table->string('NomRetiro', 100)->nullable();
			$table->string('Nomentrega', 10)->nullable();
			$table->date('Fecha_Entrega')->nullable();
			$table->primary(['Fecha_Retiro','tipo_equipo','Cod_establecimiento']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('retiro_equipos');
	}

}
