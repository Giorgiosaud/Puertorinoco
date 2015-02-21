<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPaseos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paseos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('horaDeSalida');
			$table->string('nombre');
			$table->string('orden');
			$table->boolean('publico')->default(true);
			$table->boolean('lunes')->default(true);
			$table->boolean('martes')->default(true);
			$table->boolean('miercoles')->default(true);
			$table->boolean('jueves')->default(true);
			$table->boolean('viernes')->default(true);
			$table->boolean('sabado')->default(true);
			$table->boolean('domingo')->default(true);
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
		Schema::drop('paseos');
	}

}
