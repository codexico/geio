<?php
class Profissao extends AppModel {

	var $name = 'Profissao';
	var $validate = array(
		'name' => array('notempty')
	);

}
?>