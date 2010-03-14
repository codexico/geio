<?php 
/* SVN FILE: $Id$ */
/* Funcionario Fixture generated on: 2010-03-14 01:47:14 : 1268527634*/

class FuncionarioFixture extends CakeTestFixture {
	var $name = 'Funcionario';
	var $table = 'funcionarios';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nome' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'rg' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 20),
		'cpf' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 20),
		'loja_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'tel' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'cel' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'email' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'sexo' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'nascimento' => array('type'=>'date', 'null' => true, 'default' => NULL),
		'profissao' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'obs' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 510),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'nome' => 'Lorem ipsum dolor sit amet',
		'rg' => 'Lorem ipsum dolor ',
		'cpf' => 'Lorem ipsum dolor ',
		'loja_id' => 1,
		'tel' => 'Lorem ipsum dolor ',
		'cel' => 'Lorem ipsum dolor ',
		'email' => 'Lorem ipsum dolor sit amet',
		'sexo' => 'Lorem ipsum dolor ',
		'nascimento' => '2010-03-14',
		'profissao' => 'Lorem ipsum dolor sit amet',
		'obs' => 'Lorem ipsum dolor sit amet',
		'created' => '2010-03-14 01:47:14',
		'modified' => '2010-03-14 01:47:14'
	));
}
?>