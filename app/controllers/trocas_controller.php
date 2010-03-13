<?php
class TrocasController extends AppController {

    var $name = 'Trocas';
    var $helpers = array('Html', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allowedActions = array('index', 'view');
    }
    

    function index() {
        $this->Troca->recursive = 0;
        $this->set('trocas', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid Troca', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('troca', $this->Troca->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Troca->create();
            if ($this->Troca->save($this->data)) {
                $this->Session->setFlash(__('The Troca has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Troca could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Troca', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Troca->save($this->data)) {
                $this->Session->setFlash(__('The Troca has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Troca could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Troca->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Troca', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Troca->del($id)) {
            $this->Session->setFlash(__('Troca deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The Troca could not be deleted. Please, try again.', true));
        $this->redirect(array('action' => 'index'));
    }

}
?>