<?php 
/* SVN FILE: $Id$ */
/* Profissao Test cases generated on: 2010-04-14 21:56:22 : 1271292982*/
App::import('Model', 'Profissao');

class ProfissaoTestCase extends CakeTestCase {
	var $Profissao = null;
	var $fixtures = array('app.profissao');

	function startTest() {
		$this->Profissao =& ClassRegistry::init('Profissao');
	}

	function testProfissaoInstance() {
		$this->assertTrue(is_a($this->Profissao, 'Profissao'));
	}

	function testProfissaoFind() {
		$this->Profissao->recursive = -1;
		$results = $this->Profissao->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Profissao' => array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2010-04-14 21:56:22',
			'modified' => '2010-04-14 21:56:22'
		));
		$this->assertEqual($results, $expected);
	}
}
?>