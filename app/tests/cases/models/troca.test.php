<?php 
/* SVN FILE: $Id$ */
/* Troca Test cases generated on: 2010-03-15 20:19:01 : 1268680741*/
App::import('Model', 'Troca');

class TrocaTestCase extends CakeTestCase {
	var $Troca = null;
	var $fixtures = array('app.troca', 'app.promotor', 'app.consumidor', 'app.cupom_fiscal', 'app.cupom_promocional');

	function startTest() {
		$this->Troca =& ClassRegistry::init('Troca');
	}

	function testTrocaInstance() {
		$this->assertTrue(is_a($this->Troca, 'Troca'));
	}

	function testTrocaFind() {
		$this->Troca->recursive = -1;
		$results = $this->Troca->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Troca' => array(
			'id' => 1,
			'promotor_id' => 1,
			'consumidor_id' => 1,
			'created' => '2010-03-15 20:19:01',
			'modified' => '2010-03-15 20:19:01'
		));
		$this->assertEqual($results, $expected);
	}
}
?>