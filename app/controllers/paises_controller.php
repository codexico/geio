<?php
class PaisesController extends AppController {

	var $name = 'Paises';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Paise->recursive = 0;
		$this->set('paises', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Paise.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('paise', $this->Paise->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Paise->create();
			if ($this->Paise->save($this->data)) {
				$this->Session->setFlash(__('The Paise has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Paise could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Paise', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Paise->save($this->data)) {
				$this->Session->setFlash(__('The Paise has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Paise could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Paise->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Paise', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Paise->del($id)) {
			$this->Session->setFlash(__('Paise deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>