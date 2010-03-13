<?php
class AppController extends Controller {

    /**
     * Referências:
     * @link http://book.cakephp.org/complete/172/Authentication
     * @link http://www.webdevelopment2.com/cakephp-auth-component-tutorial-1/
     * @link http://www.littlehart.net/atthekeyboard/2007/09/11/a-hopefully-useful-tutorial-for-using-cakephps-auth-component/
     */
    var $components = array('Auth');

    function beforeFilter() {
/*
        //quand esta usando admin routes
        //se o user deslogado tenta acessar uma pagina /admin/* ele eh enviado para /admin/users/login
        //Configure::read('Routing.admin') => false previne isso
        $this->Auth->loginAction = array(Configure::read('Routing.admin') => false, 'controller' => 'users', 'action' => 'login');//default
        
        //envia para /admin/galerias ao logar
        $this->Auth->loginRedirect = array(Configure::read('Routing.admin') => true,'controller' => 'galerias', 'action' => 'index');
        
        //manda para a home ao deslogar
        $this->Auth->logoutRedirect = '/';

        //$this->Auth->allow('*');//usar para criar o primeiro user

        //permitir somente o básico ao user não autenticado
        $this->Auth->allow('display');

        //$this->Auth->deny('*');//opcional

        //automaticamente usa a função isAuthorized()
        $this->Auth->authorize = 'controller';
*/

        $this->_funcaoPrivateBefore();

    }
    /**
     * Executa quando $this->Auth->authorize = 'controller', após a autenticação no user model.
     *
     * @return boolean
     */
    function isAuthorized() {

        //se estiver acessando paginas de admin confere se o user tem o role admin
        if(isset($this->params[Configure::read('Routing.admin')])){
            if($this->Auth->user('role')!='admin') {
                $this->flash('You dont have admin access');
                return false;
            }
        }
        return true;
    }


    /**
     * exemplo
     */
    function _funcaoPrivateBefore() {
		//codigo q roda todas as vezes
		//debug("funcaoPrivateBefore");

    }
}
?>
