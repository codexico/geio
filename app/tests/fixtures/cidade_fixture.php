<?php 
/* SVN FILE: $Id$ */
/* Cidade Fixture generated on: 2010-02-24 19:03:05 : 1267038185*/

class CidadeFixture extends CakeTestFixture {
	var $name = 'Cidade';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'estado_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'cidade' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 72),
		'cep' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 8),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'uf_codigo' => array('column' => 'estado_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'estado_id'  => 1,
		'cidade'  => 'Lorem ipsum dolor sit amet',
		'cep'  => 'Lorem '
	));
}
?>