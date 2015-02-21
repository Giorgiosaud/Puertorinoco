<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaElementosDeMenu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elementos_de_menu', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->integer('nivel')->default(1);
			$table->integer('id_padre')->nullable();
			$table->string('url');
			$table->text('descripcion');
			$table->boolean('publico');
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
		Schema::drop('elementos_de_menu');
	}

}
