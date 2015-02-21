<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPagosDirectos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagos_directos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('fecha');
			$table->float('monto')->default(0);
			$table->text('descripcion');
			$table->unsignedInteger('reservacion_id');
			$table->unsignedInteger('tipo_de_pago_id');
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
		Schema::drop('pagos_directos');
	}

}
