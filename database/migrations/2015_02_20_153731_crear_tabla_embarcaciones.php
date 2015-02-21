<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEmbarcaciones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('embarcaciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->integer('orden');
			$table->boolean('publico')->default(true);
			$table->integer('abordajeMinimo');
			$table->integer('abordajeMaximo');
			$table->integer('abordajeNormal');
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
		Schema::drop('embarcaciones');
	}

}
