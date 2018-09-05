<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProveedoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proveedores', function(Blueprint $table)
		{
			$table->integer('id_Proveedor')->primary();
			$table->string('Nombre_Pro', 50)->nullable();
			$table->string('Direccion_Prov', 100)->nullable();
			$table->string('Tel_Prov', 12)->nullable();
			$table->string('Nomcontacto1', 50)->nullable();
			$table->string('Nomcontacto2', 50)->nullable();
			$table->string('e-mail', 35)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('proveedores');
	}

}
