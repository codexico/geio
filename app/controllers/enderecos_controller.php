<?php
class EnderecosController extends AppController {

	var $name = 'Enderecos';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Endereco->recursive = 0;
		$this->set('enderecos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Endereco.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('endereco', $this->Endereco->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Endereco->create();
			if ($this->Endereco->save($this->data)) {
				$this->Session->setFlash(__('The Endereco has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Endereco could not be saved. Please, try again.', true));
			}
		}
		$bairros = $this->Endereco->Bairro->find('list');
		$this->set(compact('bairros'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Endereco', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Endereco->save($this->data)) {
				$this->Session->setFlash(__('The Endereco has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Endereco could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Endereco->read(null, $id);
		}
		$bairros = $this->Endereco->Bairro->find('list');
		$this->set(compact('bairros'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Endereco', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Endereco->del($id)) {
			$this->Session->setFlash(__('Endereco deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>