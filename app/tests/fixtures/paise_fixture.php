<?php 
/* SVN FILE: $Id$ */
/* Paise Fixture generated on: 2010-02-24 19:04:07 : 1267038247*/

class PaiseFixture extends CakeTestFixture {
	var $name = 'Paise';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'iso' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 2, 'key' => 'unique'),
		'iso3' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 3),
		'numcode' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 6),
		'nome' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'iso' => array('column' => 'iso', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'iso'  => '',
		'iso3'  => 'L',
		'numcode'  => 1,
		'nome'  => 'Lorem ipsum dolor sit amet'
	));
}
?>