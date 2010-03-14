<?php 
/* SVN FILE: $Id$ */
/* Consumidor Test cases generated on: 2010-03-13 18:55:29 : 1268502929*/
App::import('Model', 'Consumidor');

class ConsumidorTestCase extends CakeTestCase {
	var $Consumidor = null;
	var $fixtures = array('app.consumidor', 'app.troca');

	function startTest() {
		$this->Consumidor =& ClassRegistry::init('Consumidor');
	}

	function testConsumidorInstance() {
		$this->assertTrue(is_a($this->Consumidor, 'Consumidor'));
	}

	function testConsumidorFind() {
		$this->Consumidor->recursive = -1;
		$results = $this->Consumidor->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Consumidor' => array(
			'id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'rg' => 1,
			'cpf' => 'Lorem ipsum do',
			'email' => 'Lorem ipsum dolor sit amet',
			'cel' => 'Lorem ipsum dolor ',
			'tel' => 'Lorem ipsum dolor ',
			'sexo' => 'Lorem ipsum dolor ',
			'nascimento' => '2010-03-13',
			'estado_civil' => 'Lorem ipsum dolor ',
			'grau_de_instrucao' => 'Lorem ipsum dolor sit amet',
			'profissao' => 'Lorem ipsum dolor sit amet',
			'obs' => 'Lorem ipsum dolor sit amet',
			'created' => '2010-03-13 18:55:29',
			'modified' => '2010-03-13 18:55:29'
		));
		$this->assertEqual($results, $expected);
	}
}
?>