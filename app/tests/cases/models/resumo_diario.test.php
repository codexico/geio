<?php 
/* SVN FILE: $Id$ */
/* ResumoDiario Test cases generated on: 2010-04-06 17:03:23 : 1270584203*/
App::import('Model', 'ResumoDiario');

class ResumoDiarioTestCase extends CakeTestCase {
	var $ResumoDiario = null;
	var $fixtures = array('app.resumo_diario');

	function startTest() {
		$this->ResumoDiario =& ClassRegistry::init('ResumoDiario');
	}

	function testResumoDiarioInstance() {
		$this->assertTrue(is_a($this->ResumoDiario, 'ResumoDiario'));
	}

	function testResumoDiarioFind() {
		$this->ResumoDiario->recursive = -1;
		$results = $this->ResumoDiario->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ResumoDiario' => array(
			'id' => 1,
			'dia' => '2010-04-06',
			'qtd_consumidores' => 1,
			'qtd_consumidores_novos' => 1,
			'qtd_cupons_fiscais' => 1,
			'qtd_cupons_promocionais' => 1,
			'valor_total' => 1,
			'valor_bandeira' => 1,
			'valor-outros' => 1,
			'ticket_medio_consumidor' => 1,
			'ticket_medio_cupom_fiscal' => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>