<?php
class CupomFiscaisController extends AppController {

    var $name = 'CupomFiscais';
    var $helpers = array('Html', 'Form', 'Number');

    function index() {
        $this->CupomFiscal->recursive = 0;
        $this->set('cupomFiscais', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid CupomFiscal', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->CupomFiscal->recursive = 0;
        $this->set('cupomFiscal', $this->CupomFiscal->read(null, $id));
        $cupomFiscal = $this->CupomFiscal->read(null, $id);
        if(!$cupomFiscal) {
            $this->Session->setFlash(__('Id do Cupom Fiscal Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('cupomFiscal', $cupomFiscal);
    }
/*
    function add() {
        if (!empty($this->data)) {
            $this->CupomFiscal->create();
            if ($this->CupomFiscal->save($this->data)) {
                $this->Session->setFlash(__('The CupomFiscal has been saved', true));
                _gerarCP();
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The CupomFiscal could not be saved. Please, try again.', true));
            }
        }

        $trocas = $this->CupomFiscal->Troca->find('list', array('fields' => array('Troca.id')));
        $lojas = $this->CupomFiscal->Loja->find('list', array('fields' => array('Loja.nome_fantasia')));
        $this->set(compact('trocas', 'lojas'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid CupomFiscal', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->CupomFiscal->save($this->data)) {
                $this->Session->setFlash(__('The CupomFiscal has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The CupomFiscal could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->CupomFiscal->read(null, $id);
        }
        $trocas = $this->CupomFiscal->Troca->find('list');
        $lojas = $this->CupomFiscal->Loja->find('list');
        $this->set(compact('trocas','lojas'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for CupomFiscal', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->CupomFiscal->del($id)) {
            $this->Session->setFlash(__('CupomFiscal deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The CupomFiscal could not be deleted. Please, try again.', true));
        $this->redirect(array('action' => 'index'));
    }
*/
}
?>