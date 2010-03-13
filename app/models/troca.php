<?php
class Troca extends AppModel {

	var $name = 'Troca';
	var $validate = array(
		'valor_total' => array('numeric'),
		'qtd_CF' => array('numeric'),
		'qtd_CP' => array('numeric'),
		'promotor_id' => array('numeric'),
		'consumidor_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Promotor' => array(
			'className' => 'Promotor',
			'foreignKey' => 'promotor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Consumidor' => array(
			'className' => 'Consumidor',
			'foreignKey' => 'consumidor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>