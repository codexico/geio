<?php 
/* SVN FILE: $Id$ */
/* Estado Test cases generated on: 2010-02-24 19:03:16 : 1267038196*/
App::import('Model', 'Estado');

class EstadoTestCase extends CakeTestCase {
	var $Estado = null;
	var $fixtures = array('app.estado');

	function startTest() {
		$this->Estado =& ClassRegistry::init('Estado');
	}

	function testEstadoInstance() {
		$this->assertTrue(is_a($this->Estado, 'Estado'));
	}

	function testEstadoFind() {
		$this->Estado->recursive = -1;
		$results = $this->Estado->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Estado' => array(
			'id'  => 1,
			'paise_id'  => 1,
			'sigla'  => '',
			'estado'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>