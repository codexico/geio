<?php
class CidadesController extends AppController {

	var $name = 'Cidades';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Cidade->recursive = 0;
		$this->set('cidades', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Cidade.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('cidade', $this->Cidade->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Cidade->create();
			if ($this->Cidade->save($this->data)) {
				$this->Session->setFlash(__('The Cidade has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Cidade could not be saved. Please, try again.', true));
			}
		}
		$estados = $this->Cidade->Estado->find('list');
		$this->set(compact('estados'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Cidade', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Cidade->save($this->data)) {
				$this->Session->setFlash(__('The Cidade has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Cidade could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Cidade->read(null, $id);
		}
		$estados = $this->Cidade->Estado->find('list');
		$this->set(compact('estados'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Cidade', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Cidade->del($id)) {
			$this->Session->setFlash(__('Cidade deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>