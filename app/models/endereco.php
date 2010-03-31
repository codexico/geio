<?php
class Endereco extends AppModel {

	var $name = 'Endereco';
	var $validate = array(
		'bairro_id' => array('numeric'),
		'cep' => array('notempty'),
		'logradouro' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Bairro' => array(
			'className' => 'Bairro',
			'foreignKey' => 'bairro_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>