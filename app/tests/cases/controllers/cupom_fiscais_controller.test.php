<?php 
/* SVN FILE: $Id$ */
/* CupomFiscaisController Test cases generated on: 2010-03-16 01:57:59 : 1268701079*/
App::import('Controller', 'CupomFiscais');

class TestCupomFiscais extends CupomFiscaisController {
	var $autoRender = false;
}

class CupomFiscaisControllerTest extends CakeTestCase {
	var $CupomFiscais = null;

	function startTest() {
		$this->CupomFiscais = new TestCupomFiscais();
		$this->CupomFiscais->constructClasses();
	}

	function testCupomFiscaisControllerInstance() {
		$this->assertTrue(is_a($this->CupomFiscais, 'CupomFiscaisController'));
	}

	function endTest() {
		unset($this->CupomFiscais);
	}
}
?>