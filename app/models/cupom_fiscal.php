<?php
class CupomFiscal extends AppModel {

    var $name = 'CupomFiscal';
    var $validate = array(
            'codigo' => array(
                            'rule' => 'isUnique',
                            'message' => 'Este cupom já foi cadastrado'
            ),
            'troca_id' => array('numeric'),
            'loja_id' => array('numeric'),
            'forma_de_pagamento' => array('notempty'),
            'valor' => array(
                            'rule' => '/^([0-9])+((,|\.)[0-9]{2})?$/i',
                            'message' => 'Formato correto: 00000,00'
            //'rule' => array('decimal', 2)
            ),
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