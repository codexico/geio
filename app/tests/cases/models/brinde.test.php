<?php 
/* SVN FILE: $Id$ */
/* Brinde Test cases generated on: 2010-04-16 03:22:18 : 1271398938*/
App::import('Model', 'Brinde');

class BrindeTestCase extends CakeTestCase {
	var $Brinde = null;
	var $fixtures = array('app.brinde');

	function startTest() {
		$this->Brinde =& ClassRegistry::init('Brinde');
	}

	function testBrindeInstance() {
		$this->assertTrue(is_a($this->Brinde, 'Brinde'));
	}

	function testBrindeFind() {
		$this->Brinde->recursive = -1;
		$results = $this->Brinde->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Brinde' => array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'valor' => 1,
			'consumidor_max' => 1,
			'estoque_inicial' => 1,
			'estoque_atual' => 1,
			'obs' => 'Lorem ipsum dolor sit amet',
			'created' => '2010-04-16 03:22:17',
			'modified' => '2010-04-16 03:22:17'
		));
		$this->assertEqual($results, $expected);
	}
}
?>