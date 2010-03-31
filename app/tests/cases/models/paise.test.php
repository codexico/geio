<?php 
/* SVN FILE: $Id$ */
/* Paise Test cases generated on: 2010-02-24 19:04:07 : 1267038247*/
App::import('Model', 'Paise');

class PaiseTestCase extends CakeTestCase {
	var $Paise = null;
	var $fixtures = array('app.paise');

	function startTest() {
		$this->Paise =& ClassRegistry::init('Paise');
	}

	function testPaiseInstance() {
		$this->assertTrue(is_a($this->Paise, 'Paise'));
	}

	function testPaiseFind() {
		$this->Paise->recursive = -1;
		$results = $this->Paise->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Paise' => array(
			'id'  => 1,
			'iso'  => '',
			'iso3'  => 'L',
			'numcode'  => 1,
			'nome'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>