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
		'estoque_atual' => array('numeric'),
            'obs' => array(
                            'rule' => array('maxLength', '510'),
                            'message' => 'Máximo 500 caracteres',
                            'allowEmpty' => true,
                            'required' => false)
	);


        function _atualizarEstoque($data){
            $this->recursive = -1;
            $this->id = $data['brinde_id'];
            $brinde = $this->read();
            return $this->saveField('estoque_atual', ($brinde['Brinde']['estoque_atual'] + $data['qtd']) );
        }
}
?>