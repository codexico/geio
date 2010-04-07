<?php 
/* SVN FILE: $Id$ */
/* ResumoDiario Fixture generated on: 2010-04-06 17:03:23 : 1270584203*/

class ResumoDiarioFixture extends CakeTestFixture {
	var $name = 'ResumoDiario';
	var $table = 'resumo_diarios';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'dia' => array('type'=>'date', 'null' => false, 'default' => NULL, 'key' => 'unique'),
		'qtd_consumidores' => array('type'=>'integer', 'null' => true, 'default' => '0', 'length' => 6),
		'qtd_consumidores_novos' => array('type'=>'integer', 'null' => true, 'default' => '0', 'length' => 6),
		'qtd_cupons_fiscais' => array('type'=>'integer', 'null' => true, 'default' => '0', 'length' => 7),
		'qtd_cupons_promocionais' => array('type'=>'integer', 'null' => true, 'default' => '0', 'length' => 7),
		'valor_total' => array('type'=>'float', 'null' => true, 'default' => '0'),
		'valor_bandeira' => array('type'=>'float', 'null' => true, 'default' => '0'),
		'valor-outros' => array('type'=>'float', 'null' => true, 'default' => '0'),
		'ticket_medio_consumidor' => array('type'=>'float', 'null' => true, 'default' => '0'),
		'ticket_medio_cupom_fiscal' => array('type'=>'float', 'null' => true, 'default' => '0'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'dia' => array('column' => 'dia', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'dia' => '2010-04-06',
		'qtd_consumidores' => 1,
		'qtd_consumidores_novos' => 1,
		'qtd_cupons_fiscais' => 1,
		'qtd_cupons_promocionais' => 1,
		'valor_total' => 1,
		'valor_bandeira' => 1,
		'valor-outros' => 1,
		'ticket_medio_consumidor' => 1,
		'ticket_medio_cupom_fiscal' => 1
	));
}
?>