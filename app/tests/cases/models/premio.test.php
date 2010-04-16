<?php 
/* SVN FILE: $Id$ */
/* Premio Test cases generated on: 2010-04-16 02:22:06 : 1271395326*/
App::import('Model', 'Premio');

class PremioTestCase extends CakeTestCase {
	var $Premio = null;
	var $fixtures = array('app.premio', 'app.troca', 'app.consumidor', 'app.promotor');

	function startTest() {
		$this->Premio =& ClassRegistry::init('Premio');
	}

	function testPremioInstance() {
		$this->assertTrue(is_a($this->Premio, 'Premio'));
	}

	function testPremioFind() {
		$this->Premio->recursive = -1;
		$results = $this->Premio->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Premio' => array(
			'id' => 1,
			'troca_id' => 1,
			'consumidor_id' => 1,
			'promotor_id' => 1,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 1,
			'created' => '2010-04-16 02:22:06',
			'modified' => '2010-04-16 02:22:06'
		));
		$this->assertEqual($results, $expected);
	}
}
?>