<?php 
/* SVN FILE: $Id$ */
/* Endereco Fixture generated on: 2010-02-24 19:03:11 : 1267038191*/

class EnderecoFixture extends CakeTestFixture {
	var $name = 'Endereco';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'bairro_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'cep' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 8),
		'logradouro' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 72),
		'complemento' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 72),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'bairro_codigo' => array('column' => 'bairro_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'bairro_id'  => 1,
		'cep'  => 'Lorem ',
		'logradouro'  => 'Lorem ipsum dolor sit amet',
		'complemento'  => 'Lorem ipsum dolor sit amet'
	));
}
?>