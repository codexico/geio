<?php 
/* SVN FILE: $Id$ */
/* Loja Fixture generated on: 2010-03-14 01:43:52 : 1268527432*/

class LojaFixture extends CakeTestFixture {
	var $name = 'Loja';
	var $table = 'lojas';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'razao_social' => array('type'=>'string', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'nome_fantasia' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'participante' => array('type'=>'boolean', 'null' => false, 'default' => NULL),
		'cnpj' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'numero_da_loja' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 10),
		'ramo_de_atividade' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'contato' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'email_contato' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'telefone' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'razao_social' => array('column' => array('razao_social', 'nome_fantasia'), 'unique' => 0))
	);
	var $records = array(array(
		'id' => 1,
		'razao_social' => 'Lorem ipsum dolor sit amet',
		'nome_fantasia' => 'Lorem ipsum dolor sit amet',
		'participante' => 1,
		'cnpj' => 'Lorem ipsum dolor ',
		'numero_da_loja' => 'Lorem ip',
		'ramo_de_atividade' => 'Lorem ipsum dolor sit amet',
		'contato' => 'Lorem ipsum dolor sit amet',
		'email_contato' => 'Lorem ipsum dolor sit amet',
		'telefone' => 'Lorem ipsum dolor ',
		'created' => '2010-03-14 01:43:52',
		'modified' => '2010-03-14 01:43:52'
	));
}
?>