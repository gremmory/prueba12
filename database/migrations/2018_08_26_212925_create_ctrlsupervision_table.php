<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCtrlsupervisionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ctrlsupervision', function(Blueprint $table)
		{
			$table->string('cod_establecimiento', 12);
			$table->integer('numsupervision');
			$table->string('nomsupervisor', 50)->nullable();
			$table->dateTime('fecha_inicio')->nullable()->unique('fecha_inicio_UNIQUE');
			$table->dateTime('fecha_fin')->nullable();
			$table->text('actividades')->nullable();
			$table->text('observaciones')->nullable();
			$table->text('recomendaciones')->nullable();
			$table->primary(['cod_establecimiento','numsupervision']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ctrlsupervision');
	}

}
