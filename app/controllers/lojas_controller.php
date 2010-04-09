<?php
class LojasController extends AppController {

    var $name = 'Lojas';
    var $helpers = array('Html', 'Form');

    var $uses = array('Loja', 'CupomFiscal', 'Consumidor');


    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allowedActions = array('resumo_diario');//TODO: remover e build_acl
    }

    function resumo_diario(){

        $this->paginate = array(
                'CupomFiscal' => array('fields' => array( 'CupomFiscal.data_compra','CupomFiscal.loja_id','COUNT(CupomFiscal.codigo) AS sum_cf',
                    'AVG(CupomFiscal.valor) AS avg_valor','SUM(CupomFiscal.valor) AS sum_valor'
                    ,'Loja.nome_fantasia'),
                        'group' => array('data_compra','loja_id'),
                'contain' => array('Loja'),
                        'recursive' => 0 ));
        $this->set('resumoDiarios', $this->paginate('CupomFiscal'));


    }


    function index() {
        $this->Loja->recursive = 0;
        $this->set('lojas', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid Loja', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Loja->recursive = 1;
        $loja = $this->Loja->read(null, $id);//debug($loja);

        $this->CupomFiscal->Behaviors->attach('Containable');
        $this->paginate = array(
                'conditions' => array('loja_id' => $id),
                'contain' => array('Consumidor'),
                'limit' => 50,
           //'group' => array('consumidor_id')
                //'recursive' => -1
        );
        $cupom_fiscais = $this->paginate('CupomFiscal');//debug($cupom_fiscais);

        $this->set(compact('loja', 'cupom_fiscais') );
    }

    function add() {

        if (!empty($this->data)) {
            //debug($this->data);
            $this->Loja->create();
            if ($this->Loja->save($this->data)) {
                $this->Session->setFlash(__('Loja criada', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Ocorreu algum erro, tente novamente por favor.', true));
            }
        }
    }

    function consumidores() {
        if (!empty($this->data)) {
            $this->Loja->create();
            if ($this->Loja->save($this->data)) {
                $this->Session->setFlash(__('The Loja has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Loja could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Loja', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Loja->save($this->data)) {
                $this->Session->setFlash(__('The Loja has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Loja could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Loja->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Loja', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Loja->del($id)) {
            $this->Session->setFlash(__('Loja deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The Loja could not be deleted. Please, try again.', true));
        $this->redirect(array('action' => 'index'));
    }

}
?>