<?php
class PromotoresController extends AppController {

    var $name = 'Promotores';
    var $helpers = array('Html', 'Form');

    var $uses = array('Promotor','User');

    function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allowedActions = array('index', 'view');
    }


    function index() {
        $this->Promotor->recursive = 0;
        $this->set('promotores', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid Promotor', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('promotor', $this->Promotor->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            //debug($this->data);

            //grupo dos promotores
            $this->data['User']['group_id'] = 3; //TODO: fazer dinamico, ou usar ACL, ou usar uma CONSTANTE, ...

            if($this->User->Promotor->saveall($this->data)) {// lembrar que so funciona se o mysql for InnoDB
                $this->Session->setFlash(__('The Promotor has been saved', true));
                $this->redirect(array('action' => 'index'));
            }else {
                $this->data['User']['password'] = '';//zerar o password
                $this->Session->setFlash(__('The Promotor could not be saved. Please, try again.', true));
            }

            /*
            $this->Promotor->create();
            if ($this->Promotor->save($this->data)) {
                $this->Session->setFlash(__('The Promotor has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Promotor could not be saved. Please, try again.', true));
            }
             * 
             */
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Promotor', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            //debug($this->data);
            //if($this->User->Promotor->saveall($this->data)) {//TODO: editar tambem o User na mesma tela
            if ($this->Promotor->save($this->data)) {
                $this->Session->setFlash(__('The Promotor has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Promotor could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Promotor->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Promotor', true));
            $this->redirect(array('action' => 'index'));
        }

        //nao existe um deleteAll() para deletar User e Promotor ao mesmo tempo?
        $promotor = $this->Promotor->findById($id);

        //if ($this->Promotor->del($id)) {
        if ($this->Promotor->del($id) && $this->User->del($promotor['User']['id'])) {
        
            $this->Session->setFlash(__('Promotor deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The Promotor could not be deleted. Please, try again.', true));
        $this->redirect(array('action' => 'index'));
    }

}
?>