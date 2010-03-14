<?php
class Funcionario extends AppModel {

	var $name = 'Funcionario';
	var $validate = array(
		'nome' => array('notempty'),
		'rg' => array('notempty'),
		'cpf' => array('notempty'),
		'email' => array('email')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Loja' => array(
			'className' => 'Loja',
			'foreignKey' => 'loja_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>