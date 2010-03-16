<?php 
/* SVN FILE: $Id$ */
/* TrocasController Test cases generated on: 2010-03-15 20:19:58 : 1268680798*/
App::import('Controller', 'Trocas');

class TestTrocas extends TrocasController {
	var $autoRender = false;
}

class TrocasControllerTest extends CakeTestCase {
	var $Trocas = null;

	function startTest() {
		$this->Trocas = new TestTrocas();
		$this->Trocas->constructClasses();
	}

	function testTrocasControllerInstance() {
		$this->assertTrue(is_a($this->Trocas, 'TrocasController'));
	}

	function endTest() {
		unset($this->Trocas);
	}
}
?>