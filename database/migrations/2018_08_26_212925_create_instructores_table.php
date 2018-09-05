<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstructoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructores', function(Blueprint $table)
		{
			$table->string('cod_instructor', 10)->primary();
			$table->string('primer_apellido', 50)->nullable();
			$table->string('segundo_apellido', 50)->nullable();
			$table->string('apellido_casada', 50)->nullable();
			$table->string('primer_nombre', 50)->nullable();
			$table->string('segundo_nombre', 50)->nullable();
			$table->string('direccion', 50)->nullable();
			$table->string('telefono_casa', 12)->nullable();
			$table->string('telefono_celular', 12)->nullable();
			$table->string('orden_cedula', 3)->nullable();
			$table->string('num_cedula', 12)->nullable();
			$table->string('cod_mupio', 5)->nullable()->index('fk_Instructores_MUNICIPIOS1_idx');
			$table->string('cod_Depto', 5)->nullable()->index('fk_Instructores_MUNICIPIOS2_idx');
			$table->string('e_mail', 100)->nullable();
			$table->date('fecha_nac')->nullable();
			$table->date('fecha_contrato')->nullable();
			$table->decimal('sueldo_inicial', 10, 0)->nullable();
			$table->date('fecha_ingreso')->nullable();
			$table->string('id_profesion', 3)->nullable()->index('fk_Instructores_Profesiones_idx');
			$table->boolean('estudia_actualmente')->nullable();
			$table->string('carrera_que_estudia', 45)->nullable();
			$table->string('ultimo_grado_aprobado', 300)->nullable();
			$table->string('cod_establecimiento', 12)->nullable()->index('fk_Instructores_establecimientos_idx');
			$table->string('nombre_director', 80)->nullable();
			$table->integer('id_jornada')->nullable()->index('fk_Instructores_Jornada_idx');
			$table->dateTime('hora_entrada')->nullable();
			$table->dateTime('hora_salida')->nullable();
			$table->integer('cantidad_alumnos')->nullable();
			$table->dateTime('fecha_actualizacion')->nullable();
			$table->binary('foto')->nullable();
			$table->text('comentarios')->nullable();
			$table->string('estado', 25)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instructores');
	}

}
