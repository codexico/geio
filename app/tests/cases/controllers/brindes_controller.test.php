<?php 
/* SVN FILE: $Id$ */
/* BrindesController Test cases generated on: 2010-04-15 19:13:24 : 1271369604*/
App::import('Controller', 'Brindes');

class TestBrindes extends BrindesController {
	var $autoRender = false;
}

class BrindesControllerTest extends CakeTestCase {
	var $Brindes = null;

	function startTest() {
		$this->Brindes = new TestBrindes();
		$this->Brindes->constructClasses();
	}

	function testBrindesControllerInstance() {
		$this->assertTrue(is_a($this->Brindes, 'BrindesController'));
	}

	function endTest() {
		unset($this->Brindes);
	}
}
?>