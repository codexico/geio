<?php 
/* SVN FILE: $Id$ */
/* CupomPromocional Fixture generated on: 2010-03-15 20:21:25 : 1268680885*/

class CupomPromocionalFixture extends CakeTestFixture {
	var $name = 'CupomPromocional';
	var $table = 'cupom_promocionais';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'troca_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'promotor_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'consumidor_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'data_impressao' => array('type'=>'timestamp', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'troca_id' => 1,
		'promotor_id' => 1,
		'consumidor_id' => 1,
		'data_impressao' => 1,
		'created' => '2010-03-15 20:21:25',
		'modified' => '2010-03-15 20:21:25'
	));
}
?>