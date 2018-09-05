<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fases', function(Blueprint $table)
		{
			$table->integer('Id_Fase')->primary();
			$table->string('Descripcion', 100)->nullable();
			$table->dateTime('Fecha_Inicio')->nullable();
			$table->string('Cooperador', 50)->nullable();
			$table->integer('Id_Proveedor')->nullable()->index('fk_Fases_Proveedores_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fases');
	}

}
