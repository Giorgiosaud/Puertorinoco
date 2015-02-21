<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEmbarcacionFechaEspecial extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('embarcacion_fecha_especial', function(Blueprint $table)
		{
			$table->unsignedInteger('embarcacion_id')->index();
			$table->foreign('embarcacion_id')->references('id')->on('embarcaciones')->onDelete('cascade');
			$table->unsignedInteger('fecha_especial_id')->index();
			$table->foreign('fecha_especial_id')->references('id')->on('fechas_especiales')->onDelete('cascade');
			$table->boolean('activa');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('embarcacion_fecha_especial');
	}

}
