<?php
class UsuariosController extends AppController {

    var $name = 'Usuarios';
    var $helpers = array('Html', 'Form');

    var $uses = array('Usuario','User');

    function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allowedActions = array('index', 'view');
    }
    

    function index() {
        $this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate(array('Usuario.deleted' => 0)));
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id de Usuário Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Usuario->recursive = 0;
        $usuario = $this->Usuario->read(null, $id);//debug($troca);
        if(!$usuario) {
            $this->Session->setFlash(__('Id do Usuário Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('usuario', $usuario);
    }

    function add() {
        if (!empty($this->data)) {
            //grupo dos promotores
            $this->data['User']['group_id'] = 2; //TODO: fazer dinamico, ou usar ACL, ou usar uma CONSTANTE, ...

            if($this->User->Usuario->saveall($this->data)) {// lembrar que so funciona se o mysql for InnoDB
                $this->Session->setFlash(__('Usuário salvo com sucesso.', true));
                $this->redirect(array('action' => 'index'));
            }else {
                $this->data['User']['password'] = '';//zerar o password
                $this->Session->setFlash(__('O Usuário não foi salvo. Tente novamente.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Id de Usuário Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {

            if($this->User->Usuario->saveall($this->data)) {// lembrar que so funciona se o mysql for InnoDB
                $this->Session->setFlash(__('Usuário salvo com sucesso.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Usuário não foi salvo. Tente novamente.', true));
            }
        }
        if (empty($this->data)) {
            $this->Usuario->recursive = 0;
            $usuario = $this->Usuario->read(null, $id);//debug($troca);
            if(!$usuario) {
                $this->Session->setFlash(__('Id do Usuário Inválido', true));
                $this->redirect(array('action' => 'index'));
            }
            $this->data = $usuario;
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id de Usuário Inválido', true));
            $this->redirect(array('action' => 'index'));
        }

        //nao existe um deleteAll() para deletar o modelo e o belongTo ao mesmo tempo?
        $usuario = $this->Usuario->findById($id);

        //if ($this->Usuario->del($id)) {
//        if ($this->Usuario->del($id) && $this->User->del($usuario['User']['id'])) {
//
//            $this->Session->setFlash(__('Usuario deletado', true));
//            $this->redirect(array('action' => 'index'));
//        }
        
        
        //SoftDeletable Behavior
        $this->User->del($usuario['User']['id']);
        $this->Usuario->del($id);

        $this->User->recursive = -1;
        $this->User->enableSoftDeletable('find', false);
        $softDeleted2 = $this->User->field('deleted', array('id'=>($usuario['User']['id'])) );

        $this->Usuario->recursive = -1;
        $this->Usuario->enableSoftDeletable('find', false);
        $softDeleted1 = $this->Usuario->field('deleted', array('id'=>$id) );

        
        if($softDeleted1 && $softDeleted2) {
            $this->Session->setFlash(__('Usuário deletado', true));
            $this->redirect(array('action' => 'index'));
        }

        $this->Session->setFlash(__('O Usuário não pode ser deletado. Tente novamente.', true));
        $this->redirect(array('action' => 'index'));
    }

}
?>