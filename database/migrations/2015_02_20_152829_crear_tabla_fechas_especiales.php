<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFechasEspeciales extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fechas_especiales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('fecha');
			$table->string('clase');
			$table->boolean('activa');

			$table->text('descripcion');
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
		Schema::drop('fechas_especiales');
	}

}
