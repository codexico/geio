<?php 
/* SVN FILE: $Id$ */
/* Profissao Fixture generated on: 2010-04-14 21:56:22 : 1271292982*/

class ProfissaoFixture extends CakeTestFixture {
	var $name = 'Profissao';
	var $table = 'profissoes';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 120),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'name' => 'Lorem ipsum dolor sit amet',
		'created' => '2010-04-14 21:56:22',
		'modified' => '2010-04-14 21:56:22'
	));
}
?>