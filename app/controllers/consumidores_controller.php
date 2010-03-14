<?php
class ConsumidoresController extends AppController {

	var $name = 'Consumidores';
	var $helpers = array('Html', 'Form', 'CakePtbr.Formatacao');


	function index() {
		$this->Consumidor->recursive = 0;
		$this->set('consumidores', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Consumidor', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('consumidor', $this->Consumidor->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
                    //debug($this->data);
			$this->Consumidor->create();
			if ($this->Consumidor->save($this->data)) {
				$this->Session->setFlash(__('The Consumidor has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Consumidor could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Consumidor', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Consumidor->save($this->data)) {
				$this->Session->setFlash(__('The Consumidor has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Consumidor could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Consumidor->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Consumidor', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Consumidor->del($id)) {
			$this->Session->setFlash(__('Consumidor deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Consumidor could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>