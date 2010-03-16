<?php
class Funcionario extends AppModel {

    var $name = 'Funcionario';

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