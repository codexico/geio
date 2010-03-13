<?php
class Consumidor extends AppModel {

	var $name = 'Consumidor';
	var $validate = array(
		'nome' => array('notempty'),
		'rg' => array('numeric'),
		'cpf' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Troca' => array(
			'className' => 'Troca',
			'foreignKey' => 'consumidor_id',
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