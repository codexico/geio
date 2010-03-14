<?php 
/* SVN FILE: $Id$ */
/* FuncionariosController Test cases generated on: 2010-03-14 01:48:16 : 1268527696*/
App::import('Controller', 'Funcionarios');

class TestFuncionarios extends FuncionariosController {
	var $autoRender = false;
}

class FuncionariosControllerTest extends CakeTestCase {
	var $Funcionarios = null;

	function startTest() {
		$this->Funcionarios = new TestFuncionarios();
		$this->Funcionarios->constructClasses();
	}

	function testFuncionariosControllerInstance() {
		$this->assertTrue(is_a($this->Funcionarios, 'FuncionariosController'));
	}

	function endTest() {
		unset($this->Funcionarios);
	}
}
?>