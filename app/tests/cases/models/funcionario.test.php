<?php 
/* SVN FILE: $Id$ */
/* Funcionario Test cases generated on: 2010-03-14 01:47:14 : 1268527634*/
App::import('Model', 'Funcionario');

class FuncionarioTestCase extends CakeTestCase {
	var $Funcionario = null;
	var $fixtures = array('app.funcionario', 'app.loja');

	function startTest() {
		$this->Funcionario =& ClassRegistry::init('Funcionario');
	}

	function testFuncionarioInstance() {
		$this->assertTrue(is_a($this->Funcionario, 'Funcionario'));
	}

	function testFuncionarioFind() {
		$this->Funcionario->recursive = -1;
		$results = $this->Funcionario->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Funcionario' => array(
			'id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'rg' => 'Lorem ipsum dolor ',
			'cpf' => 'Lorem ipsum dolor ',
			'loja_id' => 1,
			'tel' => 'Lorem ipsum dolor ',
			'cel' => 'Lorem ipsum dolor ',
			'email' => 'Lorem ipsum dolor sit amet',
			'sexo' => 'Lorem ipsum dolor ',
			'nascimento' => '2010-03-14',
			'profissao' => 'Lorem ipsum dolor sit amet',
			'obs' => 'Lorem ipsum dolor sit amet',
			'created' => '2010-03-14 01:47:14',
			'modified' => '2010-03-14 01:47:14'
		));
		$this->assertEqual($results, $expected);
	}
}
?>