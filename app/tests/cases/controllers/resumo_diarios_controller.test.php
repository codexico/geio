<?php 
/* SVN FILE: $Id$ */
/* ResumoDiariosController Test cases generated on: 2010-04-06 17:03:52 : 1270584232*/
App::import('Controller', 'ResumoDiarios');

class TestResumoDiarios extends ResumoDiariosController {
	var $autoRender = false;
}

class ResumoDiariosControllerTest extends CakeTestCase {
	var $ResumoDiarios = null;

	function startTest() {
		$this->ResumoDiarios = new TestResumoDiarios();
		$this->ResumoDiarios->constructClasses();
	}

	function testResumoDiariosControllerInstance() {
		$this->assertTrue(is_a($this->ResumoDiarios, 'ResumoDiariosController'));
	}

	function endTest() {
		unset($this->ResumoDiarios);
	}
}
?>