<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMunicipiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('municipios', function(Blueprint $table)
		{
			$table->string('COD_DEPTO', 5);
			$table->string('COD_MUPIO', 5);
			$table->string('NOM_MUPIO', 50)->nullable();
			$table->primary(['COD_DEPTO','COD_MUPIO']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('municipios');
	}

}
