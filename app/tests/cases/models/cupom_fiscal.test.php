<?php 
/* SVN FILE: $Id$ */
/* CupomFiscal Test cases generated on: 2010-03-16 02:00:48 : 1268701248*/
App::import('Model', 'CupomFiscal');

class CupomFiscalTestCase extends CakeTestCase {
	var $CupomFiscal = null;
	var $fixtures = array('app.cupom_fiscal', 'app.troca', 'app.loja');

	function startTest() {
		$this->CupomFiscal =& ClassRegistry::init('CupomFiscal');
	}

	function testCupomFiscalInstance() {
		$this->assertTrue(is_a($this->CupomFiscal, 'CupomFiscal'));
	}

	function testCupomFiscalFind() {
		$this->CupomFiscal->recursive = -1;
		$results = $this->CupomFiscal->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('CupomFiscal' => array(
			'id' => 1,
			'codigo' => 'Lorem ipsum dolor sit amet',
			'troca_id' => 1,
			'loja_id' => 1,
			'valor' => 1,
			'forma_de_pagamento' => 'Lorem ipsum dolor ',
			'bandeira' => 'Lorem ipsum dolor ',
			'created' => '2010-03-16 02:00:47',
			'modified' => '2010-03-16 02:00:47'
		));
		$this->assertEqual($results, $expected);
	}
}
?>