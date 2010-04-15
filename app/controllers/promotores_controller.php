<?php
class PromotoresController extends AppController {

    var $name = 'Promotores';
    var $helpers = array('Html', 'Form', 'Number');

    var $uses = array('Promotor','User');

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allowedActions = array('trocas');
    }


    function index() {
        $this->Promotor->recursive = 0;
        $this->set('promotores', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
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
                $this->Session->setFlash(__('Promotor salvo com sucesso.', true));
                $this->redirect(array('action' => 'index'));
            }else {
                $this->data['User']['password'] = '';//zerar o password
                $this->Session->setFlash(__('O Promotor não foi salvo. Tente novamente.', true));
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
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            //debug($this->data);
            //if($this->User->Promotor->saveall($this->data)) {//TODO: editar tambem o User na mesma tela
            if ($this->Promotor->save($this->data)) {
                $this->Session->setFlash(__('Promotor salvo com sucesso.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Promotor não foi salvo. Tente novamente.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Promotor->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }

        //nao existe um deleteAll() para deletar User e Promotor ao mesmo tempo?
        $promotor = $this->Promotor->findById($id);

        //if ($this->Promotor->del($id)) {
        if ($this->Promotor->del($id) && $this->User->del($promotor['User']['id'])) {
        
            $this->Session->setFlash(__('Promotor deletado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('O Promotor não pode ser deletado. Tente novamente.', true));
        $this->redirect(array('action' => 'index'));
    }

    function trocas($id){
        if (!$id) {
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('promotor', $this->Promotor->read(null, $id));


        $this->Promotor->Troca->Behaviors->attach('Containable');
        $this->paginate = array(
                'conditions' => array('promotor_id' => $id),
                'contain' => array('Consumidor'),
                'limit' => 50,
                'recursive' => 0
        );
        $trocas = $this->paginate('Troca');//debug($trocas);

        $this->set( compact('trocas'));
    }

}
?>