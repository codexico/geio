<?php
class Loja extends AppModel {

    var $name = 'Loja';

    var $actsAs = array('CakePtbr.Validacao');


    var $validate = array(
            'razao_social' => array('notempty'),
            'nome_fantasia' => array('notempty'),
            'participante' => array('numeric'),
            'email_contato' => array('rule' => array('email'),
                            'required' => false,
                            'allowEmpty' => true,
                            'message' => 'Email inválido'),
            'cnpj' => array('rule' => array('cnpj'),
                            'required' => false,
                            'allowEmpty' => true,
                            'message' => 'CNPJ inválido')


    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $hasMany = array(
            'Funcionario' => array(
                            'className' => 'Funcionario',
                            'foreignKey' => 'loja_id',
                            'dependent' => false,
                            'conditions' => '',
                            'fields' => '',
                            'order' => '',
                            'limit' => '',
                            'offset' => '',
                            'exclusive' => '',
                            'finderQuery' => '',
                            'counterQuery' => ''
            ),
            'Cupom_Fiscal' => array(
                            'className' => 'CupomFiscal',
                            'foreignKey' => 'loja_id',
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