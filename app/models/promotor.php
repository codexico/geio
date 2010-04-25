<?php
class Promotor extends AppModel {

    var $name = 'Promotor';

    var $actsAs = array('CakePtbr.Validacao', 'SoftDeletable' => array('find'=>false) );
    
    var $validate = array(

            'username' => array('notempty',
                            'required' => true),
            'passwd' => array('notempty',
                            'required' => true),
            'passwd_confirm' => array('notempty',
                            'required' => true),

            'nome' => array('notempty',
                            'required' => true),
            'email' => array('rule' => array('email'),
                            'required' => true,
                            'message' => 'Email inválido'),

            'rg' => array('rule' => 'notempty',
                            'required' => true,
                            'message' => 'Favor preencher o RG'),
        
            'cpf' => array('rule' => array('cpf',true),
                            'required' => true,
                            'message' => 'Cpf inválido'),

            'tel' => array('rule' => 'telefone',
                            'message' => 'Telefone inválido',
                            'allowEmpty' => true,
                            'required' => false),
            'cel' => array('rule' => 'telefone',
                            'message' => 'Telefone inválido',
                            'allowEmpty' => true,
                            'required' => false),
            'obs' => array(
                            'rule' => array('maxLength', '510'),
                            'message' => 'Máximo 500 caracteres',
                            'allowEmpty' => true,
                            'required' => false)

            /*
		'nome' => array('notempty'),
		'email' => array('email'),
		'rg' => array('numeric'),
		'user_id' => array('numeric')
             *
            */
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
            'User' => array(
                            'className' => 'User',
                            'foreignKey' => 'user_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
            )
    );

    var $hasMany = array(
            'Troca' => array(
                            'className' => 'Troca',
                            'foreignKey' => 'promotor_id',
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