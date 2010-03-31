<?php 
/* SVN FILE: $Id$ */
/* CidadesController Test cases generated on: 2010-02-24 19:03:05 : 1267038185*/
App::import('Controller', 'Cidades');

class TestCidades extends CidadesController {
	var $autoRender = false;
}

class CidadesControllerTest extends CakeTestCase {
	var $Cidades = null;

	function startTest() {
		$this->Cidades = new TestCidades();
		$this->Cidades->constructClasses();
	}

	function testCidadesControllerInstance() {
		$this->assertTrue(is_a($this->Cidades, 'CidadesController'));
	}

	function endTest() {
		unset($this->Cidades);
	}
}
?>