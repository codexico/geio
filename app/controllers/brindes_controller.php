<?php
/**
 * @property Entrada $Entrada
 * @property Brinde $Brinde
 */
class BrindesController extends AppController {

    var $name = 'Brindes';
    var $helpers = array('Html', 'Form');

    function index() {
        $this->Brinde->recursive = 0;
        $this->set('brindes', $this->paginate(array('Brinde.deleted' => 0)));
        $this->set('totais', $this->Brinde->_totais_brindes() );
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Brinde inválido', true));
            $this->redirect(array('action' => 'index'));
        }

        $this->set('brinde', $this->Brinde->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->data['Brinde']['valor'] = Configure::read('Regras.Brinde.preco');
            $this->Brinde->create();
            if ($this->Brinde->save($this->data)) {
                $this->Session->setFlash(__('Brinde salvo com sucesso!', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Brinde não pode ser salvo. Tente novamente por favor.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Brinde', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Brinde->save($this->data)) {
                $this->Session->setFlash(__('Brinde editado com sucesso!', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Brinde não pode ser salvo. Tente novamente por favor.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Brinde->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Brinde inválido', true));
            $this->redirect(array('action' => 'index'));
        }
//        if ($this->Brinde->del($id)) {
//            $this->Session->setFlash(__('Brinde deletedo', true));
//            $this->redirect(array('action' => 'index'));
//        }
        //SoftDeletable Behavior
        $this->Brinde->del($id);

        $this->Brinde->recursive = -1;
        $this->Brinde->enableSoftDeletable('find', false);
        $softDeleted = $this->Brinde->field('deleted', array('id'=>$id) );
        if($softDeleted) {
            $this->Session->setFlash(__('Brinde deletado', true));
            $this->redirect(array('action' => 'index'));
        }

        $this->Session->setFlash(__('O Brinde não foi deletado. Tente novamente por favor.', true));
        $this->redirect(array('action' => 'index'));
    }

}
?>