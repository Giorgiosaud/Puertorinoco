<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToMercadopago extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mercadopagos', function(Blueprint $table)
		{
			$table->string('identificationType')->nullable();
            $table->string('identificationNumber')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mercadopagos', function(Blueprint $table)
		{
			$table->dropColumn('identificationType');
            $table->dropColumn('identificationNumber');
		});
	}

}
