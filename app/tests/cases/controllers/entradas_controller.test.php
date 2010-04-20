<?php 
/* SVN FILE: $Id$ */
/* EntradasController Test cases generated on: 2010-04-20 13:50:37 : 1271782237*/
App::import('Controller', 'Entradas');

class TestEntradas extends EntradasController {
	var $autoRender = false;
}

class EntradasControllerTest extends CakeTestCase {
	var $Entradas = null;

	function startTest() {
		$this->Entradas = new TestEntradas();
		$this->Entradas->constructClasses();
	}

	function testEntradasControllerInstance() {
		$this->assertTrue(is_a($this->Entradas, 'EntradasController'));
	}

	function endTest() {
		unset($this->Entradas);
	}
}
?>