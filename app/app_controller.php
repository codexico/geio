<?php
class AppController extends Controller {

    /**
     * Referências:
     * @link http://book.cakephp.org/complete/641/Simple-Acl-controlled-Application
     */

    var $components = array('Acl', 'Auth');

    function beforeFilter() {
        //Configure AuthComponent
        $this->Auth->authorize = 'actions';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'posts', 'action' => 'add');

    }

}
?>
