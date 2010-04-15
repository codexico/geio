<?php
class BrindesController extends AppController {

	var $name = 'Brindes';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Brinde->recursive = 0;
		$this->set('brindes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Brinde', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('brinde', $this->Brinde->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Brinde->create();
			if ($this->Brinde->save($this->data)) {
				$this->Session->setFlash(__('The Brinde has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Brinde could not be saved. Please, try again.', true));
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
				$this->Session->setFlash(__('The Brinde has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Brinde could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Brinde->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Brinde', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Brinde->del($id)) {
			$this->Session->setFlash(__('Brinde deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Brinde could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>