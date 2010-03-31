<?php 
/* SVN FILE: $Id$ */
/* EnderecosController Test cases generated on: 2010-02-24 19:03:11 : 1267038191*/
App::import('Controller', 'Enderecos');

class TestEnderecos extends EnderecosController {
	var $autoRender = false;
}

class EnderecosControllerTest extends CakeTestCase {
	var $Enderecos = null;

	function startTest() {
		$this->Enderecos = new TestEnderecos();
		$this->Enderecos->constructClasses();
	}

	function testEnderecosControllerInstance() {
		$this->assertTrue(is_a($this->Enderecos, 'EnderecosController'));
	}

	function endTest() {
		unset($this->Enderecos);
	}
}
?>