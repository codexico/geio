<?php 
/* SVN FILE: $Id$ */
/* Entrada Fixture generated on: 2010-04-20 13:50:00 : 1271782200*/

class EntradaFixture extends CakeTestFixture {
	var $name = 'Entrada';
	var $table = 'entradas';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'brinde_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'qtd' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 6),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'created' => '2010-04-20 13:50:00',
		'modified' => '2010-04-20 13:50:00',
		'brinde_id' => 1,
		'qtd' => 1
	));
}
?>