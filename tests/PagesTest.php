<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testInitialPage()
	{
		$this->visit('/')->see('slider');
	}

}
