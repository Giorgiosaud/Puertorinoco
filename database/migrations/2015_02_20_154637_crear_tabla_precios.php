<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPrecios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('precios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('adulto');
			$table->float('mayor');
			$table->float('nino');
			$table->timestamp('aplicar_desde')->default(\Carbon\Carbon::now());
			$table->unsignedInteger('tipo_de_paseo_id');
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
		Schema::drop('precios');
	}

}
