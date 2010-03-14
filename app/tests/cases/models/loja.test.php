<?php 
/* SVN FILE: $Id$ */
/* Loja Test cases generated on: 2010-03-14 01:43:52 : 1268527432*/
App::import('Model', 'Loja');

class LojaTestCase extends CakeTestCase {
	var $Loja = null;
	var $fixtures = array('app.loja', 'app.funcionario');

	function startTest() {
		$this->Loja =& ClassRegistry::init('Loja');
	}

	function testLojaInstance() {
		$this->assertTrue(is_a($this->Loja, 'Loja'));
	}

	function testLojaFind() {
		$this->Loja->recursive = -1;
		$results = $this->Loja->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Loja' => array(
			'id' => 1,
			'razao_social' => 'Lorem ipsum dolor sit amet',
			'nome_fantasia' => 'Lorem ipsum dolor sit amet',
			'participante' => 1,
			'cnpj' => 'Lorem ipsum dolor ',
			'numero_da_loja' => 'Lorem ip',
			'ramo_de_atividade' => 'Lorem ipsum dolor sit amet',
			'contato' => 'Lorem ipsum dolor sit amet',
			'email_contato' => 'Lorem ipsum dolor sit amet',
			'telefone' => 'Lorem ipsum dolor ',
			'created' => '2010-03-14 01:43:52',
			'modified' => '2010-03-14 01:43:52'
		));
		$this->assertEqual($results, $expected);
	}
}
?>