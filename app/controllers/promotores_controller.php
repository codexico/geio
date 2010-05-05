<?php
/**
 * @property Promotor $Promotor
 * @property Troca $Troca
 */
class PromotoresController extends AppController {

    var $name = 'Promotores';
    var $helpers = array('Html', 'Form', 'Number','Paginacao');

    var $uses = array('Promotor','User');

    function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('*');
    }


    function index() {
        $this->Promotor->recursive = 0;
        $this->set('promotores', $this->paginate(array('Promotor.deleted' => 0)));
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $promotor = $this->Promotor->read(null, $id);
        if(!$promotor) {
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('promotor', $promotor);

        //extras
        $this->loadModel('Troca');
        $this->Troca->recursive = -1;
        $relatorio = $this->Troca->_buscaRelatorioPromotor($id);//debug($relatorio);

        $this->paginate = array(
                'conditions' => array('Troca.promotor_id' => $id),
                'limit' => 20,
                'extra'=>$id,
                //'group'=>'consumidor_id',
                'contain'=>'Consumidor',
                'order' => 'Troca.created DESC'
        );
        $trocas = $this->paginate('Troca');//debug($trocas[0]);
        $this->set(compact('trocas','relatorio') );
    }

    function add() {
        if (!empty($this->data)) {
            //grupo dos promotores
            $this->data['User']['group_id'] = 3; //TODO: fazer dinamico, ou usar ACL, ou usar uma CONSTANTE, ...

            if($this->User->Promotor->saveall($this->data)) {// lembrar que so funciona se o mysql for InnoDB
                $this->Session->setFlash(__('Promotor salvo com sucesso.', true));
                $this->redirect(array('action' => 'index'));
            }else {
                $this->data['User']['password'] = '';//zerar o password
                $this->Session->setFlash(__('O Promotor não foi salvo. Tente novamente.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            //debug($this->data);
            //if($this->User->Promotor->saveall($this->data)) {//TODO: editar tambem o User na mesma tela
            if ($this->Promotor->save($this->data)) {
                $this->Session->setFlash(__('Promotor salvo com sucesso.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Promotor não foi salvo. Tente novamente.', true));
            }
        }
        if (empty($this->data)) {
            $this->Promotor->recursive = 0;
            $promotor = $this->Promotor->read(null, $id);//debug($troca);
            if(!$promotor) {
                $this->Session->setFlash(__('Id do Promotor Inválido', true));
                $this->redirect(array('action' => 'index'));
            }
            $this->data = $promotor;
        }
    }

    function senha($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $this->Promotor->recursive = 0;
            $promotor = $this->Promotor->read(null, $id);//debug($promotor);
            $this->set('promotor', $promotor);
            $this->data['User']['username'] = $promotor['User']['username'];
            $this->data['User']['group_id'] = $promotor['User']['group_id'];
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('Senha trocada com sucesso.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Ocorreu algum erro. Tente novamente.', true));
            }
        }
        if (empty($this->data)) {
            $this->Promotor->recursive = 0;
            $promotor = $this->Promotor->read(null, $id);//debug($promotor);
            $this->set('promotor', $promotor);
            if(!$promotor) {
                $this->Session->setFlash(__('Id do Promotor Inválido', true));
                $this->redirect(array('action' => 'index'));
            }
            $this->data = $promotor;
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }

        //nao existe um deleteAll() para deletar User e Promotor ao mesmo tempo?
        //$promotor = $this->Promotor->findById($id);
        $promotor = $this->Promotor->read(null, $id);
        if(!$promotor) {
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }

        //if ($this->Promotor->del($id)) {
//        if ($this->Promotor->del($id) && $this->User->del($promotor['User']['id'])) {
//
//            $this->Session->setFlash(__('Promotor deletado', true));
//            $this->redirect(array('action' => 'index'));
//        }

        //SoftDeletable Behavior
        $this->User->del($promotor['User']['id']);
        $this->Promotor->del($id);

        $this->User->recursive = -1;
        $this->User->enableSoftDeletable('find', false);
        $softDeleted2 = $this->User->field('deleted', array('id'=>($promotor['User']['id'])) );

        $this->Promotor->recursive = -1;
        $this->Promotor->enableSoftDeletable('find', false);
        $softDeleted1 = $this->Promotor->field('deleted', array('id'=>$id) );


        if($softDeleted1 && $softDeleted2) {
            $this->Session->setFlash(__('Promotor deletado', true));
            $this->redirect(array('action' => 'index'));
        }

        $this->Session->setFlash(__('O Promotor não pode ser deletado. Tente novamente.', true));
        $this->redirect(array('action' => 'index'));
    }

    function trocas($id) {
        if (!$id) {
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }

        //$this->set('promotor', $this->Promotor->read(null, $id));
        $promotor = $this->Promotor->read(null, $id);
        if(!$promotor) {
            $this->Session->setFlash(__('Id de Promotor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('promotor', $promotor);


        $this->Promotor->Troca->Behaviors->attach('Containable');
        $this->paginate = array(
                'conditions' => array('promotor_id' => $id),
                'contain' => array('Consumidor'),
                'limit' => 50,
                'recursive' => 0
        );
        $trocas = $this->paginate('Troca');//debug($trocas);

        $this->set( compact('trocas'));
    }

}
?>