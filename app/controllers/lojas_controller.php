<?php
/**
 * @property Loja $Loja
 * @property CupomFiscal $CupomFiscal
 */
class LojasController extends AppController {

    var $name = 'Lojas';
    var $helpers = array('Html', 'Form', 'Number','Paginacao');

    var $uses = array('Loja', 'CupomFiscal', 'Consumidor');


    function beforeFilter() {
        parent::beforeFilter();
    }

    function resumo_diario() {

        $this->paginate = array(
                'CupomFiscal' => array(
                        'fields' => array(
                                'date_FORMAT(`CupomFiscal`.`data_compra`, "%Y-%m-%d") AS dmy',
                                'COUNT(CupomFiscal.codigo) AS sum_cf','AVG(CupomFiscal.valor) AS avg_valor','SUM(CupomFiscal.valor) AS sum_valor',
                                'CupomFiscal.loja_id','Loja.nome_fantasia'),
                        'group' => array('date_FORMAT(`CupomFiscal`.`data_compra`, "%Y-%m-%d")','Loja.nome_fantasia'),
                        'order' => array('Loja.nome_fantasia' => 'asc','`CupomFiscal`.`data_compra`'=>'asc'),
                        'limit'=>20,
                        'passit' => $this->passedArgs, // pass via $extra
                        'recursive' => 0));

        $this->set('resumoDiarios', $this->paginate('CupomFiscal') );
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

        $relatorio = $this->CupomFiscal->_buscaRelatorioLoja($id);//debug($relatorio);

        //$this->CupomFiscal->Behaviors->attach('Containable');
        $this->paginate = array(
                'conditions' => array('loja_id' => $id),
                //'contain' => array('Consumidor'),
                'limit' => 50,
            'extra'=>$id,
                //'group' => array('consumidor_id')
                //'recursive' => 1
        );
        $cupom_fiscais = $this->paginate('CupomFiscal');//debug($cupom_fiscais[0]);

        $this->set(compact('loja', 'cupom_fiscais','relatorio') );
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