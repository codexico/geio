<?php 
/* SVN FILE: $Id$ */
/* PremiosController Test cases generated on: 2010-04-16 02:24:48 : 1271395488*/
App::import('Controller', 'Premios');

class TestPremios extends PremiosController {
	var $autoRender = false;
}

class PremiosControllerTest extends CakeTestCase {
	var $Premios = null;

	function startTest() {
		$this->Premios = new TestPremios();
		$this->Premios->constructClasses();
	}

	function testPremiosControllerInstance() {
		$this->assertTrue(is_a($this->Premios, 'PremiosController'));
	}

	function endTest() {
		unset($this->Premios);
	}
}
?>