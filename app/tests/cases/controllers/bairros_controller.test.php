<?php 
/* SVN FILE: $Id$ */
/* BairrosController Test cases generated on: 2010-02-24 19:03:03 : 1267038183*/
App::import('Controller', 'Bairros');

class TestBairros extends BairrosController {
	var $autoRender = false;
}

class BairrosControllerTest extends CakeTestCase {
	var $Bairros = null;

	function startTest() {
		$this->Bairros = new TestBairros();
		$this->Bairros->constructClasses();
	}

	function testBairrosControllerInstance() {
		$this->assertTrue(is_a($this->Bairros, 'BairrosController'));
	}

	function endTest() {
		unset($this->Bairros);
	}
}
?>