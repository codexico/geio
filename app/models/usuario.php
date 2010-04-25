<?php
class Usuario extends AppModel {

    var $name = 'Usuario';

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
                            'message' => 'Email inválido')

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

}
?>