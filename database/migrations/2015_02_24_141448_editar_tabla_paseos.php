<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditarTablaPaseos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('paseos', function(Blueprint $table)
		{
			$table->foreign('tipo_de_paseo_id')->references('id')->on('tipos_de_paseos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('paseos', function(Blueprint $table)
		{
			$table->dropForeign('paseos_tipo_de_paseo_id_foreign');
		});
	}

}
