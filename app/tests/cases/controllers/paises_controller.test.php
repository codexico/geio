<?php 
/* SVN FILE: $Id$ */
/* PaisesController Test cases generated on: 2010-02-24 19:04:07 : 1267038247*/
App::import('Controller', 'Paises');

class TestPaises extends PaisesController {
	var $autoRender = false;
}

class PaisesControllerTest extends CakeTestCase {
	var $Paises = null;

	function startTest() {
		$this->Paises = new TestPaises();
		$this->Paises->constructClasses();
	}

	function testPaisesControllerInstance() {
		$this->assertTrue(is_a($this->Paises, 'PaisesController'));
	}

	function endTest() {
		unset($this->Paises);
	}
}
?>