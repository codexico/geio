<?php 
/* SVN FILE: $Id$ */
/* Estado Fixture generated on: 2010-02-24 19:03:16 : 1267038196*/

class EstadoFixture extends CakeTestFixture {
	var $name = 'Estado';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'paise_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'sigla' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 2),
		'estado' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 40),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'paise_id'  => 1,
		'sigla'  => '',
		'estado'  => 'Lorem ipsum dolor sit amet'
	));
}
?>