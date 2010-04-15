<?php
class FuncionariosController extends AppController {

    var $name = 'Funcionarios';
    var $helpers = array('Html', 'Form');
    var $uses = array("Funcionario",'Profissao');

    function index() {
        $this->Funcionario->recursive = 0;
        $this->set('funcionarios', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id de Funcionário Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('funcionario', $this->Funcionario->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Funcionario->create();
            if ($this->Funcionario->save($this->data)) {
                $this->Session->setFlash(__('Funcionario salvo com sucesso.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Funcionario não foi salvo. Tente novamente.', true));
            }
        }
        $lojas = $this->Funcionario->Loja->find('list', array('fields' => array('Loja.nome_fantasia')));
        $lojas = array_merge(array('empty'=>''), $lojas );
        $this->set(compact('lojas'));

        /*
        * Busca as profissoes e prepara um array para preencher o
        * select na primeira vez que o formulário for carregado.
        */
        $profissoes = $this->Profissao->find('list',array('fields' => array('Profissao.name', 'Profissao.name')));
        $this->set('profissoes', $profissoes);

    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Id de Funcionário Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Funcionario->save($this->data)) {
                $this->Session->setFlash(__('Funcionario salvo com sucesso.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Funcionario não foi salvo. Tente novamente.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Funcionario->read(null, $id);
        }
        $lojas = $this->Funcionario->Loja->find('list', array('fields' => array('Loja.nome_fantasia')));
        $this->set(compact('lojas'));

        /*
        * Busca as profissoes e prepara um array para preencher o
        * select na primeira vez que o formulário for carregado.
        */
        $profissoes = $this->Profissao->find('list',array('fields' => array('Profissao.name', 'Profissao.name')));
        $this->set('profissoes', $profissoes);
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id de Funcionário Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Funcionario->del($id)) {
            $this->Session->setFlash(__('Funcionario deletado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('O Funcionario não foi salvo. Tente novamente.', true));
        $this->redirect(array('action' => 'index'));
    }

}
?>