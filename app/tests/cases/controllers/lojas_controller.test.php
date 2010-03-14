<?php 
/* SVN FILE: $Id$ */
/* LojasController Test cases generated on: 2010-03-14 01:44:56 : 1268527496*/
App::import('Controller', 'Lojas');

class TestLojas extends LojasController {
	var $autoRender = false;
}

class LojasControllerTest extends CakeTestCase {
	var $Lojas = null;

	function startTest() {
		$this->Lojas = new TestLojas();
		$this->Lojas->constructClasses();
	}

	function testLojasControllerInstance() {
		$this->assertTrue(is_a($this->Lojas, 'LojasController'));
	}

	function endTest() {
		unset($this->Lojas);
	}
}
?>