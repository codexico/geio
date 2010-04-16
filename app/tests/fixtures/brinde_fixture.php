<?php 
/* SVN FILE: $Id$ */
/* Brinde Fixture generated on: 2010-04-16 03:22:17 : 1271398937*/

class BrindeFixture extends CakeTestFixture {
	var $name = 'Brinde';
	var $table = 'brindes';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'valor' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'consumidor_max' => array('type'=>'integer', 'null' => true, 'default' => '0', 'length' => 2),
		'estoque_inicial' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'estoque_atual' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'obs' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 500),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
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
}
?>