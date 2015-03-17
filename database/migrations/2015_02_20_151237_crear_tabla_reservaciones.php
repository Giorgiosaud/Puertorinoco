<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReservaciones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservaciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('fecha');
			$table->unsignedInteger('cliente_id');
			$table->unsignedInteger('embarcacion_id');
			$table->unsignedInteger('paseo_id');
			$table->unsignedInteger('estado_del_pago_id');
			$table->integer('adultos')->default(0);
			$table->integer('mayores')->default(0);
			$table->integer('ninos')->default(0);
			$table->float('montoTotal')->nullable();
            $table->float('deudaRestante')->default(0);
			$table->boolean('confirmado')->default(false);
			$table->string('hechoPor')->default('client');
			$table->string('modificadoPor')->nullable();
			$table->longText('notas')->nullable();
			$table->softDeletes();
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
		Schema::drop('reservaciones');
	}

}
