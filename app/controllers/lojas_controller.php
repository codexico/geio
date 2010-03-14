<?php
class LojasController extends AppController {

	var $name = 'Lojas';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Loja->recursive = 0;
		$this->set('lojas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Loja', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('loja', $this->Loja->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Loja->create();
			if ($this->Loja->save($this->data)) {
				$this->Session->setFlash(__('The Loja has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Loja could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Loja', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Loja->save($this->data)) {
				$this->Session->setFlash(__('The Loja has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Loja could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Loja->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Loja', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Loja->del($id)) {
			$this->Session->setFlash(__('Loja deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Loja could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>