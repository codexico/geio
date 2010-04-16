<?php 
/* SVN FILE: $Id$ */
/* Premio Fixture generated on: 2010-04-16 02:22:06 : 1271395326*/

class PremioFixture extends CakeTestFixture {
	var $name = 'Premio';
	var $table = 'premios';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'troca_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'consumidor_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'promotor_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'model' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'foreign_key' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'troca_id' => 1,
		'consumidor_id' => 1,
		'promotor_id' => 1,
		'model' => 'Lorem ipsum dolor sit amet',
		'foreign_key' => 1,
		'created' => '2010-04-16 02:22:06',
		'modified' => '2010-04-16 02:22:06'
	));
}
?>