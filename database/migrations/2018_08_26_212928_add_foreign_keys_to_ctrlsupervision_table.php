<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCtrlsupervisionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ctrlsupervision', function(Blueprint $table)
		{
			$table->foreign('cod_establecimiento', 'fk_ctrlsupervision_establecimientos')->references('cod_establecimiento')->on('establecimientos')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ctrlsupervision', function(Blueprint $table)
		{
			$table->dropForeign('fk_ctrlsupervision_establecimientos');
		});
	}

}
