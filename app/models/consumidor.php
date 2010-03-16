<?php
class Consumidor extends AppModel {

    var $name = 'Consumidor';

    var $actsAs = array('CakePtbr.Validacao', 'CakePtbr.AjusteData');

    
    var $validate = array(
            'nome' => array('notempty'),

            'cpf' => array('rule' => array('cpf',true),
                            'required' => true,
                            'message' => 'Cpf inválido'),

            'rg' => array('rule' => 'notempty',
                            'required' => true,
                            'message' => 'Favor preencher o RG'),

            'email' => array('rule' => array('email'),
                            'required' => false,
                            'allowEmpty' => true,
                            'message' => 'Email inválido'),

            'cel' => array('rule' => 'telefone',
                            'message' => 'Telefone inválido',
                            'required' => true),

            'nascimento' => array('rule'=>'date',
                            'allowEmpty' => true,
                            'required' => false),

            'tel' => array('rule' => 'telefone',
                            'message' => 'Telefone inválido',
                            'allowEmpty' => true,
                            'required' => false),
            'obs' => array('rule' => array('maxLength', '510'),
                            'message' => 'Máximo 500 caracteres',
                            'allowEmpty' => true,
                            'required' => false)
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $hasMany = array(
            'Troca' => array(
                            'className' => 'Troca',
                            'foreignKey' => 'consumidor_id',
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