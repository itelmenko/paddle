<?php

require_once __DIR__ . '/test_case.php';

class GenerateCustomersReport extends Test_Case {

	public function test_valid_arguments() {
		$this->assertTrue(is_array($this->api->generateCustomersReport($this->product_id)));
		$this->assertTrue(is_array($this->api->generateCustomersReport()));
	}

	public function invalid_product_id_data_provider() {
		return array(
			array('string'),
			array(0),
			array(-1),
			array(true),
			array(false),
			array(array()),
			array(new stdClass())
		);
	}

	/**
	 * @dataProvider invalid_product_id_data_provider
	 */
	public function test_invalid_product_id($id) {
		$this->setExpectedException('InvalidArgumentException', \Paddle\Api::ERR_300, 300);
		$this->api->generateCustomersReport($id);
	}

}
