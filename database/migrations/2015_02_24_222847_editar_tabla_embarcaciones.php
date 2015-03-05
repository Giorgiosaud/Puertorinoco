<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditarTablaEmbarcaciones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('embarcaciones', function(Blueprint $table)
		{
			$table->boolean('lunes')->default(1)->before('created_at');
			$table->boolean('martes')->default(1)->before('created_at');
			$table->boolean('miercoles')->default(1)->before('created_at');
			$table->boolean('jueves')->default(1)->before('created_at');
			$table->boolean('viernes')->default(1)->before('created_at');
			$table->boolean('sabado')->default(1)->before('created_at');
			$table->boolean('domingo')->default(1)->before('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('embarcaciones', function(Blueprint $table)
		{
			$table->dropColumn(['lunes','martes','miercoles','jueves','viernes','sabado','domingo']);
		});
	}

}
