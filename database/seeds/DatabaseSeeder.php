<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('ImportarDeLaravel4Seeder');
		$this->call('eliminarColumnasSeed');//solo la primera vez
		$this->call('NuevasFunccionesSeeder');//solo la primera vez
	}

}
