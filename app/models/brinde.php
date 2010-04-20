<?php
/**
 * @property Entrada $Entrada
 * @property Brinde $Brinde
 */
class Brinde extends AppModel {

	var $name = 'Brinde';
	var $validate = array(
		'name' => array('notempty'),
		'valor' => array('numeric'),
		'consumidor_max' => array('numeric'),
		'estoque_inicial' => array('numeric'),
		'estoque_atual' => array('numeric')
	);


        function _atualizarEstoque($data){

		$brinde = $this->read(null,$data['brinde_id']);
                $brinde['Brinde']['estoque_atual'] += (int)$data['qtd'];
                $this->save($brinde);
        }
}
?>