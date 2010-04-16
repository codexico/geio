<?php
class Brinde extends AppModel {

	var $name = 'Brinde';
	var $validate = array(
		'name' => array('notempty'),
		'valor' => array('numeric'),
		'consumidor_max' => array('numeric'),
		'estoque_inicial' => array('numeric'),
		'estoque_atual' => array('numeric')
	);

}
?>