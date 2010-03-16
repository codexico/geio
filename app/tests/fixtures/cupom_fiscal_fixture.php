<?php 
/* SVN FILE: $Id$ */
/* CupomFiscal Fixture generated on: 2010-03-16 02:00:47 : 1268701247*/

class CupomFiscalFixture extends CakeTestFixture {
	var $name = 'CupomFiscal';
	var $table = 'cupom_fiscais';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'codigo' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50, 'key' => 'unique'),
		'troca_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'loja_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'valor' => array('type'=>'float', 'null' => false, 'default' => NULL),
		'forma_de_pagamento' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 20),
		'bandeira' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'codigo' => array('column' => 'codigo', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'codigo' => 'Lorem ipsum dolor sit amet',
		'troca_id' => 1,
		'loja_id' => 1,
		'valor' => 1,
		'forma_de_pagamento' => 'Lorem ipsum dolor ',
		'bandeira' => 'Lorem ipsum dolor ',
		'created' => '2010-03-16 02:00:47',
		'modified' => '2010-03-16 02:00:47'
	));
}
?>