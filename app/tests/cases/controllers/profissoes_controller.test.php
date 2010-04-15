<?php 
/* SVN FILE: $Id$ */
/* ProfissoesController Test cases generated on: 2010-04-14 21:58:05 : 1271293085*/
App::import('Controller', 'Profissoes');

class TestProfissoes extends ProfissoesController {
	var $autoRender = false;
}

class ProfissoesControllerTest extends CakeTestCase {
	var $Profissoes = null;

	function startTest() {
		$this->Profissoes = new TestProfissoes();
		$this->Profissoes->constructClasses();
	}

	function testProfissoesControllerInstance() {
		$this->assertTrue(is_a($this->Profissoes, 'ProfissoesController'));
	}

	function endTest() {
		unset($this->Profissoes);
	}
}
?>