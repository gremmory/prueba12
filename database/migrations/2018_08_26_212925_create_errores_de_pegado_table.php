<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateErroresDePegadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('errores_de_pegado', function(Blueprint $table)
		{
			$table->text('Campo0')->nullable();
			$table->text('Campo1')->nullable();
			$table->text('Campo2')->nullable();
			$table->text('Campo3')->nullable();
			$table->text('Campo4')->nullable();
			$table->text('Campo5')->nullable();
			$table->text('Campo6')->nullable();
			$table->text('Campo7')->nullable();
			$table->text('Campo8')->nullable();
			$table->text('Campo9')->nullable();
			$table->text('Campo10')->nullable();
			$table->text('Campo11')->nullable();
			$table->text('Campo12')->nullable();
			$table->text('Campo13')->nullable();
			$table->text('Campo14')->nullable();
			$table->text('Campo15')->nullable();
			$table->text('Campo16')->nullable();
			$table->text('Campo17')->nullable();
			$table->text('Campo18')->nullable();
			$table->text('Campo19')->nullable();
			$table->text('Campo20')->nullable();
			$table->text('Campo21')->nullable();
			$table->text('Campo22')->nullable();
			$table->text('Campo23')->nullable();
			$table->text('Campo24')->nullable();
			$table->text('Campo25')->nullable();
			$table->text('Campo26')->nullable();
			$table->text('Campo27')->nullable();
			$table->text('Campo28')->nullable();
			$table->text('Campo29')->nullable();
			$table->text('Campo30')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('errores_de_pegado');
	}

}
