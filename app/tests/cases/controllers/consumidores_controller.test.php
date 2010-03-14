<?php 
/* SVN FILE: $Id$ */
/* ConsumidoresController Test cases generated on: 2010-03-13 18:56:35 : 1268502995*/
App::import('Controller', 'Consumidores');

class TestConsumidores extends ConsumidoresController {
	var $autoRender = false;
}

class ConsumidoresControllerTest extends CakeTestCase {
	var $Consumidores = null;

	function startTest() {
		$this->Consumidores = new TestConsumidores();
		$this->Consumidores->constructClasses();
	}

	function testConsumidoresControllerInstance() {
		$this->assertTrue(is_a($this->Consumidores, 'ConsumidoresController'));
	}

	function endTest() {
		unset($this->Consumidores);
	}
}
?>