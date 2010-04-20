<?php 
/* SVN FILE: $Id$ */
/* Entrada Test cases generated on: 2010-04-20 13:50:00 : 1271782200*/
App::import('Model', 'Entrada');

class EntradaTestCase extends CakeTestCase {
	var $Entrada = null;
	var $fixtures = array('app.entrada', 'app.brinde');

	function startTest() {
		$this->Entrada =& ClassRegistry::init('Entrada');
	}

	function testEntradaInstance() {
		$this->assertTrue(is_a($this->Entrada, 'Entrada'));
	}

	function testEntradaFind() {
		$this->Entrada->recursive = -1;
		$results = $this->Entrada->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Entrada' => array(
			'id' => 1,
			'created' => '2010-04-20 13:50:00',
			'modified' => '2010-04-20 13:50:00',
			'brinde_id' => 1,
			'qtd' => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>