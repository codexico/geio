<?php 
/* SVN FILE: $Id$ */
/* Bairro Test cases generated on: 2010-02-24 19:03:03 : 1267038183*/
App::import('Model', 'Bairro');

class BairroTestCase extends CakeTestCase {
	var $Bairro = null;
	var $fixtures = array('app.bairro');

	function startTest() {
		$this->Bairro =& ClassRegistry::init('Bairro');
	}

	function testBairroInstance() {
		$this->assertTrue(is_a($this->Bairro, 'Bairro'));
	}

	function testBairroFind() {
		$this->Bairro->recursive = -1;
		$results = $this->Bairro->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Bairro' => array(
			'id'  => 1,
			'cidade_id'  => 1,
			'descricao'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>