<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fases', function(Blueprint $table)
		{
			$table->foreign('Id_Proveedor', 'fk_Fases_Proveedores')->references('id_Proveedor')->on('proveedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fases', function(Blueprint $table)
		{
			$table->dropForeign('fk_Fases_Proveedores');
		});
	}

}
