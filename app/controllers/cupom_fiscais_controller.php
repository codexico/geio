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
}
?>