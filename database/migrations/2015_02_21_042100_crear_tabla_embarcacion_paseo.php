<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEmbarcacionPaseo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('embarcacion_paseo', function(Blueprint $table)
		{
			$table->unsignedInteger('embarcacion_id')->index();
			$table->foreign('embarcacion_id')->references('id')->on('embarcaciones')->onDelete('cascade');
			$table->unsignedInteger('paseo_id')->index();
			$table->foreign('paseo_id')->references('id')->on('paseos')->onDelete('cascade');
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
		Schema::drop('embarcacion_paseo');
	}

}
