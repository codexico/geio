<?php
class ResumoDiariosController extends AppController {

	var $name = 'ResumoDiarios';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->ResumoDiario->recursive = 0;
		$this->set('resumoDiarios', $this->paginate());
	}

//	function view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(__('Invalid ResumoDiario', true));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('resumoDiario', $this->ResumoDiario->read(null, $id));
//	}
//
//	function add() {
//		if (!empty($this->data)) {
//			$this->ResumoDiario->create();
//			if ($this->ResumoDiario->save($this->data)) {
//				$this->Session->setFlash(__('The ResumoDiario has been saved', true));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The ResumoDiario could not be saved. Please, try again.', true));
//			}
//		}
//	}
//
//	function edit($id = null) {
//		if (!$id && empty($this->data)) {
//			$this->Session->setFlash(__('Invalid ResumoDiario', true));
//			$this->redirect(array('action' => 'index'));
//		}
//		if (!empty($this->data)) {
//			if ($this->ResumoDiario->save($this->data)) {
//				$this->Session->setFlash(__('The ResumoDiario has been saved', true));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The ResumoDiario could not be saved. Please, try again.', true));
//			}
//		}
//		if (empty($this->data)) {
//			$this->data = $this->ResumoDiario->read(null, $id);
//		}
//	}
//
//	function delete($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(__('Invalid id for ResumoDiario', true));
//			$this->redirect(array('action' => 'index'));
//		}
//		if ($this->ResumoDiario->del($id)) {
//			$this->Session->setFlash(__('ResumoDiario deleted', true));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->Session->setFlash(__('The ResumoDiario could not be deleted. Please, try again.', true));
//		$this->redirect(array('action' => 'index'));
//	}

}
?>