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
            $consumidor = $this->Troca->Consumidor->recursive = -1;
            $consumidor = $this->Troca->Consumidor->read(null, $id);
            if($consumidor) {//debug($consumidor);
                $this->set(compact('consumidor'));
            }else {
                $this->Session->setFlash('Cosumidor '. $id . ' não existe');
                $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
            }
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

            //unset ($this->data['razao_social']);//dado desnecessario

            //criar os cupons promocionais
            $totalCP = floor($this->_calculaCP($this->data['CupomFiscal']));
            for ($i = 0; $i < $totalCP; $i++) {
                $this->data['CupomPromocional'][$i]['promotor_id'] = $promotor_id['Promotor']['id'];
                $this->data['CupomPromocional'][$i]['consumidor_id'] = $consumidor['Consumidor']['id'];
            }

            //dados extras para colocar na troca e economizar processamento nos SELECTs
            $this->data['Troca']['qtd_cf'] = count($this->data['CupomFiscal']);
            $this->data['Troca']['valor_total'] = $this->_calculaValorTotalTroca($this->data['CupomFiscal']);
            $this->data['Troca']['qtd_cp'] = $totalCP;
            $this->data['Troca']['pontos'] = $this->_calculapontosTotal($this->data['CupomFiscal']);

            $this->Troca->create();
            //if ($this->Troca->saveall($this->data)) {
            if ($this->Troca->saveall($this->data, array('validate'=>'first'))) {//valida antes os cupoms
                $this->Session->setFlash(__('Troca efetuada com sucesso!', true));

                if($this->_imprimirCP($this->data['CupomFiscal'], $consumidor, $promotor_id)) {
                    $imprimiu = true;
                    debug("imprimiu");
                }

                $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
                //$this->redirect(array('action' => 'index'));

            } else {
                $this->Session->setFlash(__('The Troca could not be saved. Please, try again.', true));
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

        $pontos = $this->_calculaPontosTotal($cfs);

        $totalCP = $pontos/100;
        //debug('calcula_calculaValorTotalTrocaCP = ' . $totalCP);
        return $totalCP;

    }

    function _calculapontosTotal($cfs) {
        $pontos = 0;

        foreach ($cfs as $cf) {
            $valor = 0;

            $valor = $cf['valor']; //debug($valor);

            $forma_de_pagamento = $cf['forma_de_pagamento'];
            $bandeira = $cf['bandeira'];

            $pontos += $this->_calculaPontosCF($valor, $forma_de_pagamento, $bandeira);
            //debug("pontos = " . $pontos);
        }
        return $pontos;
    }

    function _calculaPontosCF($valor, $forma_de_pagamento, $bandeira) {
        $pontos = 0;
        if($forma_de_pagamento == "Credito" && $bandeira == "VISA") {
            $pontos = $valor*2;
        }else {
            $pontos = $valor;
        }
        return $pontos;
    }

    function _calculaValorTotalTroca($cfs) {
        $total = 0;
        foreach ($cfs as $cf) {
            $total += $cf['valor'];
        }
        return $total;
    }

    function hoje() {
        //buscar trocas de hoje
        $inicio = date('Y-m-d', strtotime("-0 days"));
        $conditions_data_troca = array("Troca.created > " => $inicio);
        $conditions_data_consumidor = array("Consumidor.created > " => $inicio);
        $conditions_data_cf = array("CupomFiscal.created > " => $inicio);
        $conditions_data_cp = array("CupomPromocional.created > " => $inicio);

        //$this->paginate['Troca'] = $conditions;
        //$trocas = $this->paginate('Troca');

//        $this->Troca->recursive = -1;
//        $trocas = $this->Troca->find('all', array('conditions' => $conditions));
//        $this->set('trocas', $this->paginate());


        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50
        );
        $trocas = $this->paginate('Troca');



        //total de trocas efetuadas
        $count_trocas = $this->Troca->find('count', array('conditions' => $conditions_data_troca));

//        .Numero consumidores atendidos
        $conditions_num_consumidores_atendidos = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $conditions_data_troca
        );
        $num_consumidores_atendidos = $this->Troca->find('count', $conditions_num_consumidores_atendidos );

//        .Cupons Fiscais Diarios (R$)
        $conditions_valor_cupons_fiscais = array(
                'fields' => "SUM(CupomFiscal.valor) AS 'total'",
                'conditions' => $conditions_data_troca
        );
        $valor_cupons_fiscais = $this->Troca->CupomFiscal->find('first', $conditions_valor_cupons_fiscais);

//        .Numero consumidores novos
        $conditions_num_consumidores_novos = array(
                'conditions' => $conditions_data_consumidor
        );
        $num_consumidores_novos = $this->Troca->Consumidor->find('count', $conditions_num_consumidores_novos);

//        .Numero de cupons fiscais trocados
        $conditions_num_cupons_fiscais = array(
                'conditions' => $conditions_data_cf
        );
        $num_cupons_fiscais = $this->Troca->CupomFiscal->find('count', $conditions_num_cupons_fiscais);

//        .Quantidade de cupons promocionais impressos
        $conditions_num_cupons_promocionais = array(
                'conditions' => $conditions_data_cp
        );
        $num_cupons_promocionais = $this->Troca->CupomPromocional->find('count', $conditions_num_cupons_promocionais);

//        .Média ticket compra
        /*
        $conditions_valor_cupons_fiscais = array(
                'fields' => "AVG(Troca.valor_total) AS 'total'",
                'conditions' => array("Troca.created > " => date('Y-m-d', strtotime("-0 days"))),
                'recursive' => -1
        );
        $media_valor_troca = $this->Troca->find('first', $conditions_valor_cupons_fiscais);
        */
        $media = $media_valor_troca = 0; //para evitar divisao por zero a seguir
        if($count_trocas != 0) {
            //.Média ticket compra
            $media_valor_troca = number_format($valor_cupons_fiscais[0]['total']/$count_trocas, 2);

            //.media de valor dos cupons fiscais
            $media = number_format($valor_cupons_fiscais[0]['total']/$num_cupons_fiscais, 2);
        }


        //Total de pontos
        $conditions_total_pontos = array(
                'fields' => "SUM(Troca.pontos) AS 'total'",
                'conditions' => $conditions_data_troca
        );
        $total_pontos = $this->Troca->find('first', $conditions_total_pontos);


        //.Quantidade de consumidores que compraram com VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira' => 'VISA',
                'CF.forma_de_pagamento' => 'Credito',
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $subQuery_num_consumidores_VISA = ' Troca.id IN ( ' . $subQuery .' ) ';
        $conditions_num_consumidores_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_VISA,
                'recursive' => -1
        );
        $num_consumidores_VISA = $this->Troca->find('count', $conditions_num_consumidores_VISA );
        //debug($num_consumidores_VISA);

//	.Quantidade de consumidores que compraram sem VISA/MASTER
        $conditionsSubQuery = array(
                'NOT' => array(
                        'AND' => array(
                                'CF.bandeira' => 'VISA',
                                'CF.forma_de_pagamento' => 'Credito')),
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $subQuery_num_consumidores_not_VISA = ' Troca.id IN ( ' . $subQuery .' ) ';
        $conditions_num_consumidores_not_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_not_VISA,
                'recursive' => -1
        );
        $num_consumidores_not_VISA = $this->Troca->find('count', $conditions_num_consumidores_not_VISA );
        //debug($num_consumidores_not_VISA);

//	.Quantidade de consumidores novos que compraram com VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira' => 'VISA',
                'CF.forma_de_pagamento' => 'Credito',
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $conditionsSubQuery2 = array(
                'Consumidor.created > ' => $inicio);

        $dbo2 = $this->Troca->Consumidor->getDataSource();
        $subQuery2 = $dbo2->buildStatement(
                array(
                'fields' => array('Consumidor.id'),
                'table' => $dbo2->fullTableName($this->Troca->Consumidor),
                'alias' => 'Consumidor',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery2,
                'order' => null,
                'group' => null
                ),
                $this->Troca->Consumidor
        );

        $subQuery_num_consumidores_novos_VISA = ' Troca.id IN ( ' . $subQuery .' ) AND Troca.consumidor_id IN ( '. $subQuery2 .' )';
        //debug($subQuery_num_consumidores_novos_VISA);
        $conditions_num_consumidores_novos_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_novos_VISA,
                'recursive' => -1
        );
        $num_consumidores_novos_VISA = $this->Troca->find('count', $conditions_num_consumidores_novos_VISA );
        //debug($num_consumidores_novos_VISA);

//	.Quantidade de consumidores novos que compraram sem VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira <> ' => 'VISA',
                'CF.forma_de_pagamento <> ' => 'Credito',
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $conditionsSubQuery2 = array(
                'Consumidor.created > ' => $inicio);

        $dbo2 = $this->Troca->Consumidor->getDataSource();
        $subQuery2 = $dbo2->buildStatement(
                array(
                'fields' => array('Consumidor.id'),
                'table' => $dbo2->fullTableName($this->Troca->Consumidor),
                'alias' => 'Consumidor',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery2,
                'order' => null,
                'group' => null
                ),
                $this->Troca->Consumidor
        );

        $subQuery_num_consumidores_novos_not_VISA = ' Troca.id IN ( ' . $subQuery .' ) AND Troca.consumidor_id IN ( '. $subQuery2 .' )';
        //debug($subQuery_num_consumidores_novos_not_VISA);
        $conditions_num_consumidores_novos_not_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_novos_not_VISA,
                'recursive' => -1
        );
        $num_consumidores_novos_not_VISA = $this->Troca->find('count', $conditions_num_consumidores_novos_not_VISA );
        //debug($num_consumidores_novos_not_VISA);



        $this->set(compact('trocas',
                'count_trocas', 'media_valor_troca', 'total_pontos',
                'num_consumidores_atendidos', 'num_consumidores_novos',
                'valor_cupons_fiscais', 'num_cupons_fiscais', 'media',
                'num_cupons_promocionais',
                'num_consumidores_VISA', 'num_consumidores_not_VISA', 'num_consumidores_novos_VISA', 'num_consumidores_novos_not_VISA'));




        /*
        $params = array(
	'conditions' => array('Model.field' => $thisValue), //array of conditions
	'recursive' => 1, //int
	'fields' => array('Model.field1', 'DISTINCT Model.field2'), //array of field names
	'order' => array('Model.created', 'Model.field3 DESC'), //string or array defining order
	'group' => array('Model.field'), //fields to GROUP BY
	'limit' => n, //int
	'page' => n, //int
	'offset'=>n, //int
	'callbacks' => true //other possible values are false, 'before', 'after'
        );
        *
        */
    }

    function ontem() {
        //buscar trocas de ontem
        $inicio = date('Y-m-d', strtotime("-1 days"));
        $fim =  date('Y-m-d', strtotime("-0 days"));

        $conditions_data_troca = array("Troca.created BETWEEN ? AND ?" => array($inicio,$fim));
        $conditions_data_consumidor = array("Consumidor.created BETWEEN ? AND ?" => array($inicio,$fim));
        $conditions_data_cf = array("CupomFiscal.created BETWEEN ? AND ?" => array($inicio,$fim));
        $conditions_data_cp = array("CupomPromocional.created BETWEEN ? AND ?" => array($inicio,$fim));

        //.total de trocas efetuadas
        $count_trocas = $this->Troca->find('count', array('conditions' => $conditions_data_troca));

        //.Numero consumidores atendidos
        $conditions_num_consumidores_atendidos = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $conditions_data_troca
        );
        $num_consumidores_atendidos = $this->Troca->find('count', $conditions_num_consumidores_atendidos );

        //.Cupons Fiscais Diarios (R$)
        $conditions_valor_cupons_fiscais = array(
                'fields' => "SUM(CupomFiscal.valor) AS 'total'",
                'conditions' => $conditions_data_troca
        );
        $valor_cupons_fiscais = $this->Troca->CupomFiscal->find('first', $conditions_valor_cupons_fiscais);

        //.Numero consumidores novos
        $conditions_num_consumidores_novos = array(
                'conditions' => $conditions_data_consumidor
        );
        $num_consumidores_novos = $this->Troca->Consumidor->find('count', $conditions_num_consumidores_novos);

        //.Numero de cupons fiscais trocados
        $conditions_num_cupons_fiscais = array(
                'conditions' => $conditions_data_cf
        );
        $num_cupons_fiscais = $this->Troca->CupomFiscal->find('count', $conditions_num_cupons_fiscais);

        //.Quantidade de cupons promocionais impressos
        $conditions_num_cupons_promocionais = array(
                'conditions' => $conditions_data_cp
        );
        $num_cupons_promocionais = $this->Troca->CupomPromocional->find('count', $conditions_num_cupons_promocionais);

        $media = $media_valor_troca = 0; //para evitar divisao por zero a seguir
        if($count_trocas != 0) {
            //.Média ticket compra
            $media_valor_troca = number_format($valor_cupons_fiscais[0]['total']/$count_trocas, 2);

            //.media de valor dos cupons fiscais
            $media = number_format($valor_cupons_fiscais[0]['total']/$num_cupons_fiscais, 2);
        }

        //Total de pontos
        $conditions_total_pontos = array(
                'fields' => "SUM(Troca.pontos) AS 'total'",
                'conditions' => $conditions_data_troca
        );
        $total_pontos = $this->Troca->find('first', $conditions_total_pontos);



        //.Quantidade de consumidores que compraram com VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira' => 'VISA',
                'CF.forma_de_pagamento' => 'Credito',
                'CF.created BETWEEN ? AND ? ' => array($inicio,$fim));

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $subQuery_num_consumidores_VISA = ' Troca.id IN ( ' . $subQuery .' ) ';
        $conditions_num_consumidores_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_VISA,
                'recursive' => -1
        );
        $num_consumidores_VISA = $this->Troca->find('count', $conditions_num_consumidores_VISA );
        //debug($num_consumidores_VISA);

//	.Quantidade de consumidores que compraram sem VISA/MASTER
        $conditionsSubQuery = array(
                'NOT' => array(
                        'AND' => array(
                                'CF.bandeira' => 'VISA',
                                'CF.forma_de_pagamento' => 'Credito')),
                'CF.created BETWEEN ? AND ? ' => array($inicio,$fim));

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $subQuery_num_consumidores_not_VISA = ' Troca.id IN ( ' . $subQuery .' ) ';
        $conditions_num_consumidores_not_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_not_VISA,
                'recursive' => -1
        );
        $num_consumidores_not_VISA = $this->Troca->find('count', $conditions_num_consumidores_not_VISA );
        //debug($num_consumidores_not_VISA);

//	.Quantidade de consumidores novos que compraram com VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira' => 'VISA',
                'CF.forma_de_pagamento' => 'Credito',
                'CF.created BETWEEN ? AND ? ' => array($inicio,$fim));

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $conditionsSubQuery2 = array(
                'Consumidor.created BETWEEN ? AND ? ' => array($inicio,$fim));

        $dbo2 = $this->Troca->Consumidor->getDataSource();
        $subQuery2 = $dbo2->buildStatement(
                array(
                'fields' => array('Consumidor.id'),
                'table' => $dbo2->fullTableName($this->Troca->Consumidor),
                'alias' => 'Consumidor',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery2,
                'order' => null,
                'group' => null
                ),
                $this->Troca->Consumidor
        );

        $subQuery_num_consumidores_novos_VISA = ' Troca.id IN ( ' . $subQuery .' ) AND Troca.consumidor_id IN ( '. $subQuery2 .' )';
        //debug($subQuery_num_consumidores_novos_VISA);
        $conditions_num_consumidores_novos_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_novos_VISA,
                'recursive' => -1
        );
        $num_consumidores_novos_VISA = $this->Troca->find('count', $conditions_num_consumidores_novos_VISA );
        //debug($num_consumidores_novos_VISA);

//	.Quantidade de consumidores novos que compraram sem VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira <> ' => 'VISA',
                'CF.forma_de_pagamento <> ' => 'Credito',
                'CF.created BETWEEN ? AND ? ' => array($inicio,$fim));

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $conditionsSubQuery2 = array(
                'Consumidor.created BETWEEN ? AND ? ' => array($inicio,$fim));

        $dbo2 = $this->Troca->Consumidor->getDataSource();
        $subQuery2 = $dbo2->buildStatement(
                array(
                'fields' => array('Consumidor.id'),
                'table' => $dbo2->fullTableName($this->Troca->Consumidor),
                'alias' => 'Consumidor',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery2,
                'order' => null,
                'group' => null
                ),
                $this->Troca->Consumidor
        );

        $subQuery_num_consumidores_novos_not_VISA = ' Troca.id IN ( ' . $subQuery .' ) AND Troca.consumidor_id IN ( '. $subQuery2 .' )';
        //debug($subQuery_num_consumidores_novos_not_VISA);
        $conditions_num_consumidores_novos_not_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_novos_not_VISA,
                'recursive' => -1
        );
        $num_consumidores_novos_not_VISA = $this->Troca->find('count', $conditions_num_consumidores_novos_not_VISA );
        //debug($num_consumidores_novos_not_VISA);


        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50
        );
        $trocas = $this->paginate('Troca');

        $this->set(compact('trocas',
                'count_trocas', 'media_valor_troca', 'total_pontos',
                'num_consumidores_atendidos', 'num_consumidores_novos',
                'valor_cupons_fiscais', 'num_cupons_fiscais', 'media',
                'num_cupons_promocionais',
                'num_consumidores_VISA', 'num_consumidores_not_VISA', 'num_consumidores_novos_VISA', 'num_consumidores_novos_not_VISA'));

    }

    function semana() {
        //buscar trocas de ontem
        $inicio = date('Y-m-d', strtotime("-1 week"));
        $conditions_data_troca = array("Troca.created > " => $inicio);
        $conditions_data_consumidor = array("Consumidor.created > " => $inicio);
        $conditions_data_cf = array("CupomFiscal.created > " => $inicio);
        $conditions_data_cp = array("CupomPromocional.created > " => $inicio);

        //.total de trocas efetuadas
        $count_trocas = $this->Troca->find('count', array('conditions' => $conditions_data_troca));

        //.Numero consumidores atendidos
        $conditions_num_consumidores_atendidos = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $conditions_data_troca
        );
        $num_consumidores_atendidos = $this->Troca->find('count', $conditions_num_consumidores_atendidos );

        //.Cupons Fiscais Diarios (R$)
        $conditions_valor_cupons_fiscais = array(
                'fields' => "SUM(CupomFiscal.valor) AS 'total'",
                'conditions' => $conditions_data_troca
        );
        $valor_cupons_fiscais = $this->Troca->CupomFiscal->find('first', $conditions_valor_cupons_fiscais);

        //.Numero consumidores novos
        $conditions_num_consumidores_novos = array(
                'conditions' => $conditions_data_consumidor
        );
        $num_consumidores_novos = $this->Troca->Consumidor->find('count', $conditions_num_consumidores_novos);

        //.Numero de cupons fiscais trocados
        $conditions_num_cupons_fiscais = array(
                'conditions' => $conditions_data_cf
        );
        $num_cupons_fiscais = $this->Troca->CupomFiscal->find('count', $conditions_num_cupons_fiscais);

        //.Quantidade de cupons promocionais impressos
        $conditions_num_cupons_promocionais = array(
                'conditions' => $conditions_data_cp
        );
        $num_cupons_promocionais = $this->Troca->CupomPromocional->find('count', $conditions_num_cupons_promocionais);

        $media = $media_valor_troca = 0; //para evitar divisao por zero a seguir
        if($count_trocas != 0) {
            //.Média ticket compra
            $media_valor_troca = number_format($valor_cupons_fiscais[0]['total']/$count_trocas, 2);

            //.media de valor dos cupons fiscais
            $media = number_format($valor_cupons_fiscais[0]['total']/$num_cupons_fiscais, 2);
        }

        //Total de pontos
        $conditions_total_pontos = array(
                'fields' => "SUM(Troca.pontos) AS 'total'",
                'conditions' => $conditions_data_troca
        );
        $total_pontos = $this->Troca->find('first', $conditions_total_pontos);



        //.Quantidade de consumidores que compraram com VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira' => 'VISA',
                'CF.forma_de_pagamento' => 'Credito',
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $subQuery_num_consumidores_VISA = ' Troca.id IN ( ' . $subQuery .' ) ';
        $conditions_num_consumidores_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_VISA,
                'recursive' => -1
        );
        $num_consumidores_VISA = $this->Troca->find('count', $conditions_num_consumidores_VISA );
        //debug($num_consumidores_VISA);

//	.Quantidade de consumidores que compraram sem VISA/MASTER
        $conditionsSubQuery = array(
                'NOT' => array(
                        'AND' => array(
                                'CF.bandeira' => 'VISA',
                                'CF.forma_de_pagamento' => 'Credito')),
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $subQuery_num_consumidores_not_VISA = ' Troca.id IN ( ' . $subQuery .' ) ';
        $conditions_num_consumidores_not_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_not_VISA,
                'recursive' => -1
        );
        $num_consumidores_not_VISA = $this->Troca->find('count', $conditions_num_consumidores_not_VISA );
        //debug($num_consumidores_not_VISA);

//	.Quantidade de consumidores novos que compraram com VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira' => 'VISA',
                'CF.forma_de_pagamento' => 'Credito',
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $conditionsSubQuery2 = array(
                'Consumidor.created > ' => $inicio);

        $dbo2 = $this->Troca->Consumidor->getDataSource();
        $subQuery2 = $dbo2->buildStatement(
                array(
                'fields' => array('Consumidor.id'),
                'table' => $dbo2->fullTableName($this->Troca->Consumidor),
                'alias' => 'Consumidor',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery2,
                'order' => null,
                'group' => null
                ),
                $this->Troca->Consumidor
        );

        $subQuery_num_consumidores_novos_VISA = ' Troca.id IN ( ' . $subQuery .' ) AND Troca.consumidor_id IN ( '. $subQuery2 .' )';
        //debug($subQuery_num_consumidores_novos_VISA);
        $conditions_num_consumidores_novos_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_novos_VISA,
                'recursive' => -1
        );
        $num_consumidores_novos_VISA = $this->Troca->find('count', $conditions_num_consumidores_novos_VISA );
        //debug($num_consumidores_novos_VISA);

//	.Quantidade de consumidores novos que compraram sem VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira <> ' => 'VISA',
                'CF.forma_de_pagamento <> ' => 'Credito',
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $conditionsSubQuery2 = array(
                'Consumidor.created > ' => $inicio);

        $dbo2 = $this->Troca->Consumidor->getDataSource();
        $subQuery2 = $dbo2->buildStatement(
                array(
                'fields' => array('Consumidor.id'),
                'table' => $dbo2->fullTableName($this->Troca->Consumidor),
                'alias' => 'Consumidor',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery2,
                'order' => null,
                'group' => null
                ),
                $this->Troca->Consumidor
        );

        $subQuery_num_consumidores_novos_not_VISA = ' Troca.id IN ( ' . $subQuery .' ) AND Troca.consumidor_id IN ( '. $subQuery2 .' )';
        //debug($subQuery_num_consumidores_novos_not_VISA);
        $conditions_num_consumidores_novos_not_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_novos_not_VISA,
                'recursive' => -1
        );
        $num_consumidores_novos_not_VISA = $this->Troca->find('count', $conditions_num_consumidores_novos_not_VISA );
        //debug($num_consumidores_novos_not_VISA);


        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50
        );
        $trocas = $this->paginate('Troca');

        $this->set(compact('trocas',
                'count_trocas', 'media_valor_troca', 'total_pontos',
                'num_consumidores_atendidos', 'num_consumidores_novos',
                'valor_cupons_fiscais', 'num_cupons_fiscais', 'media',
                'num_cupons_promocionais',
                'num_consumidores_VISA', 'num_consumidores_not_VISA', 'num_consumidores_novos_VISA', 'num_consumidores_novos_not_VISA'));

    }

    function mes() {
        //buscar trocas de ontem
        $inicio = date('Y-m-d', strtotime("-1 month"));
        $conditions_data_troca = array("Troca.created > " => $inicio);
        $conditions_data_consumidor = array("Consumidor.created > " => $inicio);
        $conditions_data_cf = array("CupomFiscal.created > " => $inicio);
        $conditions_data_cp = array("CupomPromocional.created > " => $inicio);

        //.total de trocas efetuadas
        $count_trocas = $this->Troca->find('count', array('conditions' => $conditions_data_troca));

        //.Numero consumidores atendidos
        $conditions_num_consumidores_atendidos = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $conditions_data_troca
        );
        $num_consumidores_atendidos = $this->Troca->find('count', $conditions_num_consumidores_atendidos );

        //.Cupons Fiscais Diarios (R$)
        $conditions_valor_cupons_fiscais = array(
                'fields' => "SUM(CupomFiscal.valor) AS 'total'",
                'conditions' => $conditions_data_troca
        );
        $valor_cupons_fiscais = $this->Troca->CupomFiscal->find('first', $conditions_valor_cupons_fiscais);

        //.Numero consumidores novos
        $conditions_num_consumidores_novos = array(
                'conditions' => $conditions_data_consumidor
        );
        $num_consumidores_novos = $this->Troca->Consumidor->find('count', $conditions_num_consumidores_novos);

        //.Numero de cupons fiscais trocados
        $conditions_num_cupons_fiscais = array(
                'conditions' => $conditions_data_cf
        );
        $num_cupons_fiscais = $this->Troca->CupomFiscal->find('count', $conditions_num_cupons_fiscais);

        //.Quantidade de cupons promocionais impressos
        $conditions_num_cupons_promocionais = array(
                'conditions' => $conditions_data_cp
        );
        $num_cupons_promocionais = $this->Troca->CupomPromocional->find('count', $conditions_num_cupons_promocionais);

        $media = $media_valor_troca = 0; //para evitar divisao por zero a seguir
        if($count_trocas != 0) {
            //.Média ticket compra
            $media_valor_troca = number_format($valor_cupons_fiscais[0]['total']/$count_trocas, 2);

            //.media de valor dos cupons fiscais
            $media = number_format($valor_cupons_fiscais[0]['total']/$num_cupons_fiscais, 2);
        }

        //Total de pontos
        $conditions_total_pontos = array(
                'fields' => "SUM(Troca.pontos) AS 'total'",
                'conditions' => $conditions_data_troca
        );
        $total_pontos = $this->Troca->find('first', $conditions_total_pontos);



        //.Quantidade de consumidores que compraram com VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira' => 'VISA',
                'CF.forma_de_pagamento' => 'Credito',
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $subQuery_num_consumidores_VISA = ' Troca.id IN ( ' . $subQuery .' ) ';
        $conditions_num_consumidores_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_VISA,
                'recursive' => -1
        );
        $num_consumidores_VISA = $this->Troca->find('count', $conditions_num_consumidores_VISA );
        //debug($num_consumidores_VISA);

//	.Quantidade de consumidores que compraram sem VISA/MASTER
        $conditionsSubQuery = array(
                'NOT' => array(
                        'AND' => array(
                                'CF.bandeira' => 'VISA',
                                'CF.forma_de_pagamento' => 'Credito')),
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $subQuery_num_consumidores_not_VISA = ' Troca.id IN ( ' . $subQuery .' ) ';
        $conditions_num_consumidores_not_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_not_VISA,
                'recursive' => -1
        );
        $num_consumidores_not_VISA = $this->Troca->find('count', $conditions_num_consumidores_not_VISA );
        //debug($num_consumidores_not_VISA);

//	.Quantidade de consumidores novos que compraram com VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira' => 'VISA',
                'CF.forma_de_pagamento' => 'Credito',
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $conditionsSubQuery2 = array(
                'Consumidor.created > ' => $inicio);

        $dbo2 = $this->Troca->Consumidor->getDataSource();
        $subQuery2 = $dbo2->buildStatement(
                array(
                'fields' => array('Consumidor.id'),
                'table' => $dbo2->fullTableName($this->Troca->Consumidor),
                'alias' => 'Consumidor',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery2,
                'order' => null,
                'group' => null
                ),
                $this->Troca->Consumidor
        );

        $subQuery_num_consumidores_novos_VISA = ' Troca.id IN ( ' . $subQuery .' ) AND Troca.consumidor_id IN ( '. $subQuery2 .' )';
        //debug($subQuery_num_consumidores_novos_VISA);
        $conditions_num_consumidores_novos_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_novos_VISA,
                'recursive' => -1
        );
        $num_consumidores_novos_VISA = $this->Troca->find('count', $conditions_num_consumidores_novos_VISA );
        //debug($num_consumidores_novos_VISA);

//	.Quantidade de consumidores novos que compraram sem VISA/MASTER
        $conditionsSubQuery = array(
                'CF.bandeira <> ' => 'VISA',
                'CF.forma_de_pagamento <> ' => 'Credito',
                'CF.created > ' => $inicio);

        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );

        $conditionsSubQuery2 = array(
                'Consumidor.created > ' => $inicio);

        $dbo2 = $this->Troca->Consumidor->getDataSource();
        $subQuery2 = $dbo2->buildStatement(
                array(
                'fields' => array('Consumidor.id'),
                'table' => $dbo2->fullTableName($this->Troca->Consumidor),
                'alias' => 'Consumidor',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery2,
                'order' => null,
                'group' => null
                ),
                $this->Troca->Consumidor
        );

        $subQuery_num_consumidores_novos_not_VISA = ' Troca.id IN ( ' . $subQuery .' ) AND Troca.consumidor_id IN ( '. $subQuery2 .' )';
        //debug($subQuery_num_consumidores_novos_not_VISA);
        $conditions_num_consumidores_novos_not_VISA = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_novos_not_VISA,
                'recursive' => -1
        );
        $num_consumidores_novos_not_VISA = $this->Troca->find('count', $conditions_num_consumidores_novos_not_VISA );
        //debug($num_consumidores_novos_not_VISA);


        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50
        );
        $trocas = $this->paginate('Troca');

        $this->set(compact('trocas',
                'count_trocas', 'media_valor_troca', 'total_pontos',
                'num_consumidores_atendidos', 'num_consumidores_novos',
                'valor_cupons_fiscais', 'num_cupons_fiscais', 'media',
                'num_cupons_promocionais',
                'num_consumidores_VISA', 'num_consumidores_not_VISA', 'num_consumidores_novos_VISA', 'num_consumidores_novos_not_VISA'));
    }

}
?>