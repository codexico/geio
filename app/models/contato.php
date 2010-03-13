<?php
class Contato extends AppModel {

    var $name = 'Contato';

    var $useTable = false;

    var $_schema = array(
            'nome'	=>array('type'=>'string', 'length'=>100),
            'email'	=>array('type'=>'string', 'length'=>255),
            'assunto'	=>array('type'=>'string', 'length'=>255),
            'mensagem'	=>array('type'=>'text')
    );
    
    var $validate = array(
            'nome'      => array(
                            'rule'=>VALID_NOT_EMPTY,
                            'message'=>'Informe um nome por favor.' ),
            'email'     => array(
                            'rule'=>'email',
                            'message'=>'Coloque um email válido para podermos entrar em contato.' ),
            'assunto'   => array(
                            'rule'=>VALID_NOT_EMPTY,
                            'message'=>'Qual o assunto?' ),
            'mensagem'  => array(
                            'rule'=>VALID_NOT_EMPTY,
                            'message'=>'Sem mensagem não sei o que responder!' )
    );
}
?>
