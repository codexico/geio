<?php 
/* SVN FILE: $Id$ */
/* CupomPromocionaisController Test cases generated on: 2010-03-15 20:21:57 : 1268680917*/
App::import('Controller', 'CupomPromocionais');

class TestCupomPromocionais extends CupomPromocionaisController {
	var $autoRender = false;
}

class CupomPromocionaisControllerTest extends CakeTestCase {
	var $CupomPromocionais = null;

	function startTest() {
		$this->CupomPromocionais = new TestCupomPromocionais();
		$this->CupomPromocionais->constructClasses();
	}

	function testCupomPromocionaisControllerInstance() {
		$this->assertTrue(is_a($this->CupomPromocionais, 'CupomPromocionaisController'));
	}

	function endTest() {
		unset($this->CupomPromocionais);
	}
}
?>