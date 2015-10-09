<?php

class AdminTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function probar_pagina_inicio()
	{
		$response = $this->call('GET', '/PanelAdministrativo');
		$this->assertEquals(200, $response->getStatusCode());
	}

}
