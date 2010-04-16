<?php
class PremiosController extends AppController {

	var $name = 'Premios';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Premio->recursive = 0;
		$this->set('premios', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Premio', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('premio', $this->Premio->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Premio->create();
			if ($this->Premio->save($this->data)) {
				$this->Session->setFlash(__('The Premio has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Premio could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Premio', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Premio->save($this->data)) {
				$this->Session->setFlash(__('The Premio has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Premio could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Premio->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Premio', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Premio->del($id)) {
			$this->Session->setFlash(__('Premio deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Premio could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>