<?php
/**
 *  deve ser criado automaticamente ao gravar a Troca
 * CP nao pode ser editado para evitar erros e fraudes
 *
 * @property Troca $Troca
 * @property CupomPromocional $CupomPromocional
 */
class CupomPromocionaisController extends AppController {

    var $name = 'CupomPromocionais';
    var $helpers = array('Html', 'Form');

    function index() {
        $this->CupomPromocional->recursive = 0;
        $this->paginate = array('limit'=>100);
        $this->set('cupomPromocionais', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid CupomPromocional', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('cupomPromocional', $this->CupomPromocional->read(null, $id));
    }

    function cupomPdf($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id inválido da Troca a Imprimir', true));
            $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
        }
        $this->CupomPromocional->Troca->recursive = 1;
        $troca = $this->CupomPromocional->Troca->read(null, $id);//debug($troca);

        $consumidor['Consumidor'] = $troca['Consumidor'];//debug($consumidor);

        $this->set(compact('troca', 'consumidor'));

        $this->layout = 'pdf';
        $this->render();
    }

}
?>