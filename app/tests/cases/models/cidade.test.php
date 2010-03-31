<?php 
/* SVN FILE: $Id$ */
/* Cidade Test cases generated on: 2010-02-24 19:03:05 : 1267038185*/
App::import('Model', 'Cidade');

class CidadeTestCase extends CakeTestCase {
	var $Cidade = null;
	var $fixtures = array('app.cidade');

	function startTest() {
		$this->Cidade =& ClassRegistry::init('Cidade');
	}

	function testCidadeInstance() {
		$this->assertTrue(is_a($this->Cidade, 'Cidade'));
	}

	function testCidadeFind() {
		$this->Cidade->recursive = -1;
		$results = $this->Cidade->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Cidade' => array(
			'id'  => 1,
			'estado_id'  => 1,
			'cidade'  => 'Lorem ipsum dolor sit amet',
			'cep'  => 'Lorem '
		));
		$this->assertEqual($results, $expected);
	}
}
?>