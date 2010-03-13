<?php
/**
 * @link http://book.cakephp.org/complete/176/Email
 * @link http://www.webdevelopment2.com/cakephp-contact-form-quick-dirty/
 * @link http://snook.ca/archives/cakephp/contact_form_cakephp/
 */
class ContatoController extends AppController {

    var $name = 'Contato';
    var $uses = 'Contato';
    var $helpers = array('Html', 'Form');
    var $components = array('Email','RequestHandler');

    function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow('index');

    }

    function index() {

        //$this->layout = 'contatolayout';
        
        if (!empty($this->data)) {
            if ($this->RequestHandler->isPost()) {

                $this->Contato->create($this->data);
                // There is no save(), so we need to validate manually.
                if($this->Contato->validates()) {

                    $this->_sendMail();
                }
            }
        }

    }

    function _sendMail() {

        $this->Email->to = "<". Configure::read('EMAIL_CONTATO') . ">";
        $this->Email->replyTo = $this->data['Contato']['email'];
        $this->Email->from = $this->data['Contato']['nome'].' <'.$this->data['Contato']['email'].'>';
        $this->Email->subject = 'Contato Ande Na Moda: '.$this->data['Contato']['assunto'];

        $this->Email->template = 'contato'; // note no '.ctp'

        //Send as 'html', 'text' or 'both' (default is 'text')
        $this->Email->sendAs = 'both'; // because we like to send pretty mail

        /* SMTP Options */
        $this->Email->smtpOptions = array(
                'port'		=> '25',
                'timeout'	=> '30',
                'host' 		=> Configure::read('HOST_CONTATO'),
                'username'	=> Configure::read('USERNAME_CONTATO'),
                'password'	=> Configure::read('PASSWORD_CONTATO'),
                //'client' => 'smtp_helo_hostname'
        );

        /* Set delivery method */
        //$this->Email->delivery = 'smtp';
        $this->Email->delivery = "debug";//descomentar a linha acima para enviar de verdade!

        /* Do not pass any args to send() */
        $this->Email->send();
        
        /* Check for SMTP errors. */
        $this->set('smtperrors', $this->Email->smtpError);
        
        if($this->Email->smtpError) {
            $erro = str_replace(' ', '%20', $this->Email->smtpError);
            $this->Session->setflash(
                    "Ocorreu um erro no envio, tente novamente por favor."."<br />"
                    ."Ou envie um email para o
                        <a href='mailto:" . Configure::read('WEBMASTER_EMAIL') .
                        "?subject=Erro%20no%20Contato%20" . Configure::read('WEBMASTER_EMAIL') . "
                        &body=". $erro ."' >webmaster</a>.<br />"
                    );
        }else {
            $this->Session->setflash("Sua mensagem foi enviada com sucesso, obrigado!");
        }

        //pr( $this->Session->read( 'Message.email' ) );// print array: message, layout, params
        debug( htmlspecialchars($this->Session->read( 'Message.email.message' )) );//mostra a mensagem enviada

    }

}
?>
