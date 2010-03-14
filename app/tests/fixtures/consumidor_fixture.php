<?php 
/* SVN FILE: $Id$ */
/* Consumidor Fixture generated on: 2010-03-13 18:55:29 : 1268502929*/

class ConsumidorFixture extends CakeTestFixture {
	var $name = 'Consumidor';
	var $table = 'consumidores';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nome' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'rg' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'cpf' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 16),
		'email' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'cel' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 20),
		'tel' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'sexo' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'nascimento' => array('type'=>'date', 'null' => true, 'default' => NULL),
		'estado_civil' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'grau_de_instrucao' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'profissao' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'obs' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 510),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'nome' => 'Lorem ipsum dolor sit amet',
		'rg' => 1,
		'cpf' => 'Lorem ipsum do',
		'email' => 'Lorem ipsum dolor sit amet',
		'cel' => 'Lorem ipsum dolor ',
		'tel' => 'Lorem ipsum dolor ',
		'sexo' => 'Lorem ipsum dolor ',
		'nascimento' => '2010-03-13',
		'estado_civil' => 'Lorem ipsum dolor ',
		'grau_de_instrucao' => 'Lorem ipsum dolor sit amet',
		'profissao' => 'Lorem ipsum dolor sit amet',
		'obs' => 'Lorem ipsum dolor sit amet',
		'created' => '2010-03-13 18:55:29',
		'modified' => '2010-03-13 18:55:29'
	));
}
?>