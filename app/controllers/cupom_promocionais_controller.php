<?php
class CupomPromocionaisController extends AppController {

    var $name = 'CupomPromocionais';
    var $helpers = array('Html', 'Form');

    function index() {
        $this->CupomPromocional->recursive = 0;
        $this->set('cupomPromocionais', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid CupomPromocional', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('cupomPromocional', $this->CupomPromocional->read(null, $id));
    }
    /**
     * deve ser criado automaticamente ao gravar a Troca
     */
    function add() {
        if (!empty($this->data)) {
            $this->CupomPromocional->create();
            if ($this->CupomPromocional->save($this->data)) {
                $this->Session->setFlash(__('The CupomPromocional has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The CupomPromocional could not be saved. Please, try again.', true));
            }
        }
    }

    /**
     * CP nao pode ser editado para evitar erros e fraudes
     *
     * @param <type> $id
     */
    function edit($id = null) {
            if (!$id && empty($this->data)) {
                    $this->Session->setFlash(__('Invalid CupomPromocional', true));
                    $this->redirect(array('action' => 'index'));
            }
            if (!empty($this->data)) {
                    if ($this->CupomPromocional->save($this->data)) {
                            $this->Session->setFlash(__('The CupomPromocional has been saved', true));
                            $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Session->setFlash(__('The CupomPromocional could not be saved. Please, try again.', true));
                    }
            }
            if (empty($this->data)) {
                    $this->data = $this->CupomPromocional->read(null, $id);
            }
    }

    /**
     *
     * @param <type> $id Qual o caso de uso de deletar CP?
     */
    function delete($id = null) {
            if (!$id) {
                    $this->Session->setFlash(__('Invalid id for CupomPromocional', true));
                    $this->redirect(array('action' => 'index'));
            }
            if ($this->CupomPromocional->del($id)) {
                    $this->Session->setFlash(__('CupomPromocional deleted', true));
                    $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The CupomPromocional could not be deleted. Please, try again.', true));
            $this->redirect(array('action' => 'index'));
    }
}
?>