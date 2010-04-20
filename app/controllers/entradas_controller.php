<?php
/**
 * @property Entrada $Entrada
 * @property Brinde $Brinde
 */
class EntradasController extends AppController {

	var $name = 'Entradas';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Entrada->recursive = 0;
		$this->set('entradas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Entrada', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('entrada', $this->Entrada->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Entrada->create();
                        //debug($this->data['Entrada']);
			if ($this->Entrada->save($this->data)) {
                                $this->Entrada->Brinde->_atualizarEstoque($this->data['Entrada']);
				$this->Session->setFlash(__('The Entrada has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Entrada could not be saved. Please, try again.', true));
			}
		}
        $brindes = $this->Entrada->Brinde->find('list');
        $this->set(compact('brindes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Entrada', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Entrada->save($this->data)) {
				$this->Session->setFlash(__('The Entrada has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Entrada could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Entrada->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Entrada', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Entrada->del($id)) {
			$this->Session->setFlash(__('Entrada deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Entrada could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>