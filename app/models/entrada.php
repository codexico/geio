<?php
/**
 * @property Entrada $Entrada
 * @property Brinde $Brinde
 */
class Entrada extends AppModel {

	var $name = 'Entrada';
	var $validate = array(
		'brinde_id' => array('numeric'),
		'qtd' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Brinde' => array(
			'className' => 'Brinde',
			'foreignKey' => 'brinde_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>