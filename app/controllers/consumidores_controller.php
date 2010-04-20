<?php
class ConsumidoresController extends AppController {
    /*
        * $helpers
        * Ajax utiliza a popular biblioteca Javascript Prototype Ajax e efeitos no lado do cliente. Para usar o Ajax, você precisa que a versão atual destas bibliotecas Javascript (obtidas a partir de www.prototypejs.org) estejam presentes na pasta /app/webroot/js/
        * Javascript é usado para ajudar na criação de tags e blocos de código javascript bem-formados. Ele contém diversos métodos, alguns dos quais foram desenvolvidos para funcionar com a biblioteca de Javascript Prototype.
        *
        * $uses
        * Permite o acesso deste controller aos models adicionais "Bairro", "Endereco", "Cidade", "Estado" e "Paise".
        * Curiosamente se não colocar "Cliente" em primeiro, dá erro ao listar clientes (app/cliente/index).
        *
        * $components
        * O componente RequestHandler é usado para se obter informações adicionais sobre as requisições HTTP feitas a sua aplicação CakePHP.
        * Para fazer uso do RequestHandler ele deve estar incluído no seu array de $components.
        *
        * Mais informações em:
        * http://book.cakephp.org/pt/view/53/components-helpers-and-uses
        * http://book.cakephp.org/pt/view/174/Request-Handling
        *
    */
    var $name = 'Consumidores';
    var $helpers = array('Html', 'Form', 'CakePtbr.Formatacao', 'Ajax', 'Javascript');
    var $uses = array("Consumidor", "Bairro", "Endereco", "Cidade", "Estado", "Paise",'Profissao');
    var $components = array('RequestHandler');


    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allowedActions = array('edit');
    }

    function endereco_cep() {
        $cep_num = $this->data['Consumidor']['cep']; //Recupera o cep informado no formulário

        //Busca o logradouro e bairro_id na tabela enderecos
        $logradouro = $this->Endereco->find('first',
                array(
                'conditions' => array('Endereco.cep' => $cep_num),
                'fields' => array('Endereco.logradouro', 'Endereco.bairro_id')
                )
        );

        $cep['Cep']['numero'] = $cep_num; //Armazena o numero do cep no array cep
        $endereco = $logradouro['Endereco']['logradouro']; //Guarda o logradouro recuperado da tabela enderecos
        $bairro	  = $logradouro['Endereco']['bairro_id'];  //Guarda o bairro_id recuperado da tabela enderecos

        //Busca o nome do bairro e cidade_id na tabela bairros
        $bairro = $this->Bairro->find('first',
                array(
                'conditions' => array('Bairro.id' => $bairro),
                'recursive' => -1, //Para não retornar os relacionamentos de bairros
                'fields' => array('Bairro.descricao', 'Bairro.cidade_id')
                )
        );

        $cidade = $bairro['Bairro']['cidade_id']; //Guarda o cidade_id recuperado da tabela bairros

        //Busca o nome da cidade e estado_id na tabela cidades
        $cidade = $this->Cidade->find('first',
                array(
                'conditions'=>array('Cidade.id'=>$cidade),
                'recursive'=>-1, //Para não retornar os relacionamentos de cidades
                'fields'=>array('Cidade.cidade', 'Cidade.estado_id')
                )
        );

        $estado = $cidade['Cidade']['estado_id']; //Guarda estado_id recuperado da tabela cidades

        /*
    	 * Busca o nome do estado e pais_id na tabela estados
    	 * Nota: Só existem os estados brasileiros no sql que disponibilizei
        */
        $estado = $this->Estado->find('first',
                array(
                'conditions'=>array('Estado.id'=>$estado),
                'recursive'=>-1, //Para não retornar os relacionamentos de estados
                'fields'=>array('Estado.estado', 'Estado.paise_id')
                )
        );

        $pais = $estado['Estado']['paise_id']; //Guarda o pais_id recuperado da tabela estados

        //Busca o nome do país na tabela paises
        $pais = $this->Paise->find('first',
                array(
                'conditions'=>array('Paise.id'=>$pais),
                'recursive'=>-1, //Para não retornar os relacionamentos de paises
                'fields'=>array('Paise.nome')
                )
        );

        /*
    	 * Monta um array de endereço com os dados recolhidos anteriormente das tabelas
    	 * e seta o array para ser utilizado na view
        */
        $endereco = Set::merge($cep, $logradouro, $bairro, $cidade, $estado, $pais);
        $this->set('endereco', $endereco);
    }

    function index() {
        $this->Consumidor->recursive = 0;
        $this->set('consumidores', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid Consumidor', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('consumidor', $this->Consumidor->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            //debug($this->data);
            $this->Consumidor->create();
            if ($this->Consumidor->save($this->data)) {
                $this->Session->setFlash(__('Consumidor salvo com sucesso', true));
                //$this->redirect(array('action' => 'index'));
                $this->redirect(array('controller' => 'trocas', 'action' => 'nova/'.$this->Consumidor->id));
            } else {
                $this->Session->setFlash(__('O Consumidor não foi salvo. Tente novamente.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Consumidor', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Consumidor->save($this->data)) {
                $this->Session->setFlash(__('Consumidor editado com sucesso.', true));
                if ($this->Session->read('Auth.User.group_id') == 3) {//promotor
                    $this->redirect(array('controller'=>'trocas','action' => 'nova', $id));
                }
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Consumidor não foi salvo. Tente novamente.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Consumidor->read(null, $id);
        }

        /*
        * Busca os estados e prepara um array para preencher o
        * select na primeira vez que o formulário for carregado.
        */
        $estados = $this->Estado->find('list',array('fields' => array('Estado.estado', 'Estado.estado'),));
        $this->set('estados', $estados);

        /*
        * Busca os paises e prepara um array para preencher o
        * select na primeira vez que o formulário for carregado.
        */
        $paises = $this->Paise->find('list',array('fields' => array('Paise.nome', 'Paise.nome'),));
        $this->set('paises', $paises);

        /*
        * Busca as profissoes e prepara um array para preencher o
        * select na primeira vez que o formulário for carregado.
        */
        $profissoes = $this->Profissao->find('list',array('fields' => array('Profissao.name', 'Profissao.name')));
        $this->set('profissoes', $profissoes);
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Consumidor', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Consumidor->del($id)) {
            $this->Session->setFlash(__('Consumidor deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('The Consumidor could not be deleted. Please, try again.', true));
        $this->redirect(array('action' => 'index'));
    }

    function addAjax() {
        if (!empty($this->data)) {
            //debug($this->data);
            $this->Consumidor->create();
            if ($this->Consumidor->save($this->data)) {
                echo 'success';
                $this->autoRender = false;
                exit ();
                //$this->Session->setFlash(__('The Consumidor has been saved', true));
                //$this->redirect(array('action' => 'index'));
            } else {
                echo 'error';
                $this->autoRender = false;
                exit ();
                //$this->Session->setFlash(__('The Consumidor could not be saved. Please, try again.', true));
            }
        }
    }


    function novo() {
        if (!empty($this->data)) {
            //debug($this->data);
            $this->Consumidor->create();
            if ($this->Consumidor->save($this->data)) {
                $this->Session->setFlash(__('O Consumidor foi salvo com sucesso.', true));
                $this->redirect(array('controller' => 'trocas','action' => 'nova/'.$this->Consumidor->id));
            } else {
                $this->Session->setFlash(__('Ocorreu algum erro, o Consumidor não foi salvo. Confira as mensagens e tente novamente.', true));
            }
        }

        /*
        * Busca os estados e prepara um array para preencher o
        * select na primeira vez que o formulário for carregado.
        */
        $estados = $this->Estado->find('list',array('fields' => array('Estado.estado', 'Estado.estado'),));
        $this->set('estados', $estados);

        /*
        * Busca os paises e prepara um array para preencher o
        * select na primeira vez que o formulário for carregado.
        */
        $paises = $this->Paise->find('list',array('fields' => array('Paise.nome', 'Paise.nome'),));
        $this->set('paises', $paises);

        /*
        * Busca as profissoes e prepara um array para preencher o
        * select na primeira vez que o formulário for carregado.
        */
        $profissoes = $this->Profissao->find('list',array('fields' => array('Profissao.name', 'Profissao.name')));
        $this->set('profissoes', $profissoes);
    }

    function pesquisar() {

    }
    function pesquisarCpfAjax() {
        Configure::write('debug', 0);
        $this->autoRender = false;

        if ($this->RequestHandler->isAjax()) {
            $consumidor = $this->Consumidor->findByCpf($this->data['cpf']);
            if($consumidor) {
                $this->data = $consumidor;
                /*
                * Busca os estados e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $estados = $this->Estado->find('list',array('fields' => array('Estado.estado', 'Estado.estado'),));
                $this->set('estados', $estados);
                /*
                * Busca os paises e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $paises = $this->Paise->find('list',array('fields' => array('Paise.nome', 'Paise.nome'),));
                $this->set('paises', $paises);
                /*
                * Busca os estados e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $profissoes = $this->Profissao->find('list',array('fields' => array('Profissao.name', 'Profissao.name')));
                $this->set('profissoes', $profissoes);

                $this->set(compact('consumidor'));
                $resposta =  $this->render('/elements/consumidorencontrado');
                return $resposta;
            }else {
                /*
                * Busca os estados e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $estados = $this->Estado->find('list',array('fields' => array('Estado.estado', 'Estado.estado'),));
                $this->set('estados', $estados);

                /*
                * Busca os paises e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $paises = $this->Paise->find('list',array('fields' => array('Paise.nome', 'Paise.nome'),));
                $this->set('paises', $paises);

                /*
                * Busca as profissoes e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $profissoes = $this->Profissao->find('list',array('fields' => array('Profissao.name', 'Profissao.name')));
                $this->set('profissoes', $profissoes);

                $this->set(compact('consumidor'));
                $resposta =  $this->render('/elements/consumidorencontrado');
                return $resposta;
            }
        }
        exit ();
    }
    function pesquisarRgAjax() {
        Configure::write('debug', 0);//nao retornar os sql's
        $this->autoRender = false;

        if ($this->RequestHandler->isAjax()) {
            $consumidor = $this->Consumidor->findByRg($this->data['rg']);
            if($consumidor) {
                $this->data = $consumidor;
                /*
                * Busca os estados e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $estados = $this->Estado->find('list',array('fields' => array('Estado.estado', 'Estado.estado'),));
                $this->set('estados', $estados);
                /*
                * Busca os paises e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $paises = $this->Paise->find('list',array('fields' => array('Paise.nome', 'Paise.nome'),));
                $this->set('paises', $paises);
                /*
                * Busca os estados e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $profissoes = $this->Profissao->find('list',array('fields' => array('Profissao.name', 'Profissao.name')));
                $this->set('profissoes', $profissoes);

                $this->set(compact('consumidor'));
                $resposta =  $this->render('/elements/consumidorencontrado');
                return $resposta;
            }else {
                /*
                * Busca os estados e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $estados = $this->Estado->find('list',array('fields' => array('Estado.estado', 'Estado.estado'),));
                $this->set('estados', $estados);

                /*
                * Busca os paises e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $paises = $this->Paise->find('list',array('fields' => array('Paise.nome', 'Paise.nome'),));
                $this->set('paises', $paises);

                /*
                * Busca as profissoes e prepara um array para preencher o
                * select na primeira vez que o formulário for carregado.
                */
                $profissoes = $this->Profissao->find('list',array('fields' => array('Profissao.name', 'Profissao.name')));
                $this->set('profissoes', $profissoes);

                $this->set(compact('consumidor'));
                $resposta =  $this->render('/elements/consumidorencontrado');
                return $resposta;
            }
        }
        exit ();
    }
}
?>