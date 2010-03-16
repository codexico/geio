<?php 
/* SVN FILE: $Id$ */
/* Troca Fixture generated on: 2010-03-15 20:19:01 : 1268680741*/

class TrocaFixture extends CakeTestFixture {
	var $name = 'Troca';
	var $table = 'trocas';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'promotor_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'consumidor_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'promotor_id' => 1,
		'consumidor_id' => 1,
		'created' => '2010-03-15 20:19:01',
		'modified' => '2010-03-15 20:19:01'
	));
}
?>