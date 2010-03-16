<?php 
/* SVN FILE: $Id$ */
/* CupomPromocional Test cases generated on: 2010-03-15 20:21:25 : 1268680885*/
App::import('Model', 'CupomPromocional');

class CupomPromocionalTestCase extends CakeTestCase {
	var $CupomPromocional = null;
	var $fixtures = array('app.cupom_promocional', 'app.troca', 'app.promotor', 'app.consumidor');

	function startTest() {
		$this->CupomPromocional =& ClassRegistry::init('CupomPromocional');
	}

	function testCupomPromocionalInstance() {
		$this->assertTrue(is_a($this->CupomPromocional, 'CupomPromocional'));
	}

	function testCupomPromocionalFind() {
		$this->CupomPromocional->recursive = -1;
		$results = $this->CupomPromocional->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('CupomPromocional' => array(
			'id' => 1,
			'troca_id' => 1,
			'promotor_id' => 1,
			'consumidor_id' => 1,
			'data_impressao' => 1,
			'created' => '2010-03-15 20:21:25',
			'modified' => '2010-03-15 20:21:25'
		));
		$this->assertEqual($results, $expected);
	}
}
?>