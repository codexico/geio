<?php
class Premio extends AppModel {

	var $name = 'Premio';
	var $validate = array(
		//'troca_id' => array('numeric'),
		'consumidor_id' => array('numeric'),
		'promotor_id' => array('numeric'),
		//'model' => array('notempty'),
		//'foreign_key' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Troca' => array(
			'className' => 'Troca',
			'foreignKey' => 'troca_id',
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
		),
		'Promotor' => array(
			'className' => 'Promotor',
			'foreignKey' => 'promotor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>