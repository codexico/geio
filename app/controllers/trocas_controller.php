<?php
class TrocasController extends AppController {

    var $name = 'Trocas';
    var $helpers = array('Html', 'Form', 'Javascript');

    var $uses = array('Troca','CupomPromocional', 'CupomFiscal');

    function beforeFilter() {
        parent::beforeFilter();
    }

    function index() {
        $this->Troca->recursive = 0;
        $this->set('trocas', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid Troca', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('troca', $this->Troca->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Troca->create();
            if ($this->Troca->save($this->data)) {
                $this->Session->setFlash(__('The Troca has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Troca could not be saved. Please, try again.', true));
            }
        }
        $promotores = $this->Troca->Promotor->find('list', array('fields' => array('Promotor.nome')));
        $this->set(compact('promotores'));
        $consumidores = $this->Troca->Consumidor->find('list', array('fields' => array('Consumidor.nome')));
        $this->set(compact('consumidores'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Troca', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Troca->save($this->data)) {
                $this->Session->setFlash(__('The Troca has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Troca could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Troca->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Troca', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Troca->del($id)) {
            $this->Session->setFlash(__('Troca deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The Troca could not be deleted. Please, try again.', true));
        $this->redirect(array('action' => 'index'));
    }

    function nova($id = null) {

        if ($id) {
            $consumidor = $this->Troca->Consumidor->read(null, $id);
            //debug($consumidor);
            $this->set(compact('consumidor'));
        }else {
            $this->Session->setFlash('Pesquise o Consumidor antes de fazer a Troca');
            $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
        }

        if (!empty($this->data)) {
            //pega o id do promotor atraves da sessao do user
            $promotor_id = $this->Troca->Promotor->find('first', array(
                    'recursive' => -1,
                    'conditions' => array(
                            'Promotor.user_id' => $this->Auth->user('id')
            )));
            $this->data['Troca']['promotor_id'] = $promotor_id['Promotor']['id'];
            $this->data['Troca']['consumidor_id'] = $consumidor['Consumidor']['id'];


            //debug($this->data);
            $this->Troca->create();
            if ($this->Troca->saveall($this->data, array('validate'=>'first'))) {
                $this->Session->setFlash(__('Troca efetuada com sucesso!', true));
                $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
                //$this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Troca could not be saved. Please, try again.', true));
            }

            if($this->_imprimirCP($this->data['CupomFiscal'], $consumidor, $promotor_id)) {
                $imprimiu = true;
                debug("imprimiu");
            }
        }

        $lojas = $this->Troca->CupomFiscal->Loja->find('list', array('fields' => array('Loja.nome_fantasia')));
        $lojas_razao_social = $this->Troca->CupomFiscal->Loja->find('list', array('fields' => array('Loja.razao_social')));
        $this->set(compact('lojas', 'lojas_razao_social'));
    }

    function _imprimirCP($cfs, $consumidor, $promotor_id) {
        $totalCP = floor($this->_calculaCP($cfs));
        debug('$totalCP = ' . $totalCP);
        $CPimpresso = 0;
        for ($i = 0; $i < $totalCP; $i++) {
            //imprimir
            //($this->CupomPromocional->save();
            $CPimpresso++;
        }
        if($CPimpresso == $totalCP) {
            debug("impressos = " . $CPimpresso);
            $this->Session->setFlash('Impressos '.$CPimpresso.' cupons', 'default', null, 'Impressora');
            return true;
        }
        debug("impressos errados = " . ($totalCP - $CPimpresso) );
        return false;
    }


    function _calculaCP($cfs) {
        $pontos = 0;

        foreach ($cfs as $cf) {
            $valor = 0;

            $valor = $cf['valor']; //debug($valor);

            $forma_de_pagamento = $cf['forma_de_pagamento'];
            $bandeira = $cf['bandeira'];

            $pontos += $this->_calculaPontosCF($valor, $forma_de_pagamento, $bandeira);
            //debug("pontos = " . $pontos);
        }
        $totalCP = $pontos/100;
        //debug('calculaCP = ' . $totalCP);
        return $totalCP;

    }

    function _calculaPontosCF($valor, $forma_de_pagamento, $bandeira) {
        $pontos = 0;
        if($forma_de_pagamento == "Crédito" && $bandeira == "VISA") {
            $pontos = $valor*2;
        }else {
            $pontos = $valor;
        }
        return $pontos;
    }

}
?>