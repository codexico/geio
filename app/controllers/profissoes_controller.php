<?php
class ProfissoesController extends AppController {

	var $name = 'Profissoes';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Profissao->recursive = 0;
		$this->set('profissoes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Profissao', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('profissao', $this->Profissao->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Profissao->create();
			if ($this->Profissao->save($this->data)) {
				$this->Session->setFlash(__('The Profissao has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Profissao could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Profissao', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Profissao->save($this->data)) {
				$this->Session->setFlash(__('The Profissao has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Profissao could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Profissao->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Profissao', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Profissao->del($id)) {
			$this->Session->setFlash(__('Profissao deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Profissao could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>