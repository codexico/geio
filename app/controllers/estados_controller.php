<?php
class EstadosController extends AppController {

	var $name = 'Estados';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Estado->recursive = 0;
		$this->set('estados', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Estado.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('estado', $this->Estado->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Estado->create();
			if ($this->Estado->save($this->data)) {
				$this->Session->setFlash(__('The Estado has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Estado could not be saved. Please, try again.', true));
			}
		}
		$paises = $this->Estado->Paise->find('list');
		$this->set(compact('paises'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Estado', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Estado->save($this->data)) {
				$this->Session->setFlash(__('The Estado has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Estado could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Estado->read(null, $id);
		}
		$paises = $this->Estado->Paise->find('list');
		$this->set(compact('paises'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Estado', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Estado->del($id)) {
			$this->Session->setFlash(__('Estado deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>