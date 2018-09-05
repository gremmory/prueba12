<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSwitchboardItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('switchboard_items', function(Blueprint $table)
		{
			$table->integer('SwitchboardID');
			$table->integer('ItemNumber');
			$table->string('ItemText', 350)->nullable();
			$table->integer('Command')->nullable();
			$table->string('Argument', 350)->nullable();
			$table->primary(['SwitchboardID','ItemNumber']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('switchboard_items');
	}

}
