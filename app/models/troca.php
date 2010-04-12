<?php
/**
 * @property CupomFiscal $CupomFiscal
 */
class Troca extends AppModel {

	var $name = 'Troca';

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

	var $hasMany = array(
		'CupomFiscal' => array(
			'className' => 'CupomFiscal',
			'foreignKey' => 'troca_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'CupomPromocional' => array(
			'className' => 'CupomPromocional',
			'foreignKey' => 'troca_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>