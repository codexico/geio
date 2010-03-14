<?php
class FuncionariosController extends AppController {

	var $name = 'Funcionarios';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Funcionario->recursive = 0;
		$this->set('funcionarios', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Funcionario', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('funcionario', $this->Funcionario->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Funcionario->create();
			if ($this->Funcionario->save($this->data)) {
				$this->Session->setFlash(__('The Funcionario has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Funcionario could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Funcionario', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Funcionario->save($this->data)) {
				$this->Session->setFlash(__('The Funcionario has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Funcionario could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Funcionario->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Funcionario', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Funcionario->del($id)) {
			$this->Session->setFlash(__('Funcionario deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Funcionario could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>