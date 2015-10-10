<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$this->visit('/PanelAdministrativo')->assertResponseOk();
		$this->visit('/PanelAdministrativo/inicio')->see('Login');
//		$this->assertEquals(200, $response->getStatusCode());
	}

}
