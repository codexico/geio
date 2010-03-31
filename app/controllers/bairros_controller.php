<?php
class BairrosController extends AppController {

	var $name = 'Bairros';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Bairro->recursive = 0;
		$this->set('bairros', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Bairro.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('bairro', $this->Bairro->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Bairro->create();
			if ($this->Bairro->save($this->data)) {
				$this->Session->setFlash(__('The Bairro has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Bairro could not be saved. Please, try again.', true));
			}
		}
		$cidades = $this->Bairro->Cidade->find('list');
		$this->set(compact('cidades'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Bairro', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Bairro->save($this->data)) {
				$this->Session->setFlash(__('The Bairro has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Bairro could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Bairro->read(null, $id);
		}
		$cidades = $this->Bairro->Cidade->find('list');
		$this->set(compact('cidades'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Bairro', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Bairro->del($id)) {
			$this->Session->setFlash(__('Bairro deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>