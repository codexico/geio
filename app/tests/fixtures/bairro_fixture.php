<?php 
/* SVN FILE: $Id$ */
/* Bairro Fixture generated on: 2010-02-24 19:03:03 : 1267038183*/

class BairroFixture extends CakeTestFixture {
	var $name = 'Bairro';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'cidade_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'descricao' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 72),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'cidade_codigo' => array('column' => 'cidade_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'cidade_id'  => 1,
		'descricao'  => 'Lorem ipsum dolor sit amet'
	));
}
?>