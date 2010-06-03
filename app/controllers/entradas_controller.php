<?php
/**
 * Controle de Estoque dos Brindes
 *
 * @property Entrada $Entrada
 * @property Brinde $Brinde
 */
class EntradasController extends AppController {

    var $name = 'Entradas';
    var $helpers = array('Html', 'Form');

    function index() {
        $this->Entrada->recursive = 0;
        $this->set('entradas', $this->paginate());
        $this->set('totais', $this->Entrada->_totais_entradas() );
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Entrada ou id inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('entrada', $this->Entrada->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {//debug($this->data['Entrada']);
            $this->Entrada->create();
            if ($this->Entrada->save($this->data)) {
                $this->Entrada->Brinde->_atualizarEstoque($this->data['Entrada']);
                $this->Session->setFlash(__('Estoque atualizado', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('A Entrada não foi salva. Tente novamente por favor.', true));
            }
        }
        $brindes = $this->Entrada->Brinde->find('list');
        $this->set(compact('brindes'));
    }
}
?>