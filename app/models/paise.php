<?php
class Paise extends AppModel {

	var $name = 'Paise';
	var $validate = array(
		'iso' => array('notempty'),
		'iso3' => array('notempty'),
		'numcode' => array('numeric'),
		'nome' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Estado' => array(
			'className' => 'Estado',
			'foreignKey' => 'paise_id',
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