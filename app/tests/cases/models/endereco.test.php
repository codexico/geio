<?php 
/* SVN FILE: $Id$ */
/* Endereco Test cases generated on: 2010-02-24 19:03:11 : 1267038191*/
App::import('Model', 'Endereco');

class EnderecoTestCase extends CakeTestCase {
	var $Endereco = null;
	var $fixtures = array('app.endereco');

	function startTest() {
		$this->Endereco =& ClassRegistry::init('Endereco');
	}

	function testEnderecoInstance() {
		$this->assertTrue(is_a($this->Endereco, 'Endereco'));
	}

	function testEnderecoFind() {
		$this->Endereco->recursive = -1;
		$results = $this->Endereco->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Endereco' => array(
			'id'  => 1,
			'bairro_id'  => 1,
			'cep'  => 'Lorem ',
			'logradouro'  => 'Lorem ipsum dolor sit amet',
			'complemento'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>