<?php
class CupomPromocional extends AppModel {

	var $name = 'CupomPromocional';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Troca' => array(
			'className' => 'Troca',
			'foreignKey' => 'troca_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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