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
        //$this->set('troca', $this->Troca->read(null, $id));
        $this->Troca->recursive = 0;
        $troca = $this->Troca->read(null, $id);//debug($troca);

        $this->paginate = array(
                'conditions' => array('troca_id' => $id),
                'limit' => 50,
                'recursive' => 0
        );
        $cupom_fiscais = $this->paginate('CupomFiscal');//debug($cupom_fiscais);

        $this->set( compact('troca', 'cupom_fiscais'));
    }

    function consumidor($id = null) {
        if (!$id) {
            $this->Session->setFlash('Cosumidor '. $id . ' não existe');
            $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
        }
        $this->Troca->Consumidor->recursive = -1;
        $consumidor = $this->Troca->Consumidor->read(null, $id);//debug($consumidor);

        if(!$consumidor) {
            $this->Session->setFlash('Cosumidor '. $id . ' não existe');
            $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
        }
        $this->set(compact('consumidor'));

        $this->paginate = array(
                'conditions' => array("Troca.consumidor_id" => $id),
                'limit' => 50,
                'recursive' => 0
        );
        $trocas = $this->paginate('Troca');//debug($trocas);
        $this->set('trocas', $this->paginate());
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
            $this->Troca->Consumidor->recursive = -1;
            $consumidor = $this->Troca->Consumidor->read(null, $id);//debug($consumidor);

            if(!$consumidor) {
                $this->Session->setFlash('Cosumidor '. $id . ' não existe');
                $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
            }
            //pega o id do promotor atraves da sessao do user
            $promotor = $this->Troca->Promotor->find('first', array(
                    'recursive' => -1,
                    'conditions' => array( 'Promotor.user_id' => $this->Auth->user('id') )
            ));//debug($promotor);

            $this->set(compact('consumidor', 'promotor'));
        }else {
            $this->Session->setFlash('Pesquise o Consumidor antes de fazer a Troca');
            $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
        }

        if (!empty($this->data)) {
            //incluir Consumidor e Promotor na Troca
            $this->data['Troca']['promotor_id'] = $promotor['Promotor']['id'];
            $this->data['Troca']['consumidor_id'] = $consumidor['Consumidor']['id'];

            //incluir o Consumidor no CupomFiscal
            $numCF = count($this->data['CupomFiscal']);
            for ($i = 0; $i < $numCF; $i++) {
                $this->data['CupomFiscal'][$i]['consumidor_id'] = $consumidor['Consumidor']['id'];
            }

            if( Configure::read('Regras.Brinde.true') ) {
                //$this->_calculaBrinde();//TODO
            }else {
                $valoresCP = $this->_calculaCupomPromocional();//debug($valoresCP);
            }

            $this->Troca->create();
            if ($this->Troca->saveall($this->data, array('validate'=>'first'))) {//valida antes os cupoms
                $this->Session->setFlash(__('Troca efetuada com sucesso!', true));

                if( !Configure::read('Regras.Brinde.true') ) {
                    $this->_imprimirCP();
                }
                if( Configure::read('Regras.Saldo.true') ) {
                    $this->_atualizaSaldo($valoresCP);
                }

                $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
            } else {
                $this->Session->setFlash(__('The Troca could not be saved. Please, try again.', true));
            }
        }
        $lojas = $this->Troca->CupomFiscal->Loja->find('list', array('fields' => array('Loja.nome_fantasia')));
        $lojas_razao_social = $this->Troca->CupomFiscal->Loja->find('list', array('fields' => array('Loja.razao_social')));
        $this->set(compact('lojas', 'lojas_razao_social'));
    }


    ////////////////
    ////////////
    ////
    //// REGRAS
    ////
    ////////////
    ////////////////

    /**
     * Soma os cupons fiscais de acordo com o tipo de compra e calcula a quantidade de cupons
     * e o resto
     *
     * @return array    array associativo(valorOutros, restoOutros, valorBandeira, restoBandeira, qtd_CP)
     */
    function _calculaCupomPromocional() {
        $regras = Configure::read('Regras'); //debug($regras);
        $c = $valorOutros = $valorBandeira = $restoOutros = $restoBandeira = 0;

        if($regras['Saldo']['true']) {
            $saldos = $this->Troca->Consumidor->read(array('saldo_bandeira', 'saldo_outros'));
            $restoBandeira = $saldos['Consumidor']['saldo_bandeira'];
            $restoOutros = $saldos['Consumidor']['saldo_outros'];
        }
        //soma os valores dos cupons fiscais enviados
        foreach ($this->data['CupomFiscal'] as $cf) { //debug($cf);
            if( up($cf['bandeira']) != up($regras['Bandeira']['nome']) ) {
                $valorOutros += $cf['valor']; //debug("dinheiro = " . $valorDinheiro);
            }else {
                $valorBandeira += $cf['valor']; //debug('bandeira = ' . $valorBandeira);
            }
        }
        //calcula as trocas
        $restoOutros += $valorOutros ;
        if( $restoOutros >= $regras['Valor'] ) {//trocar dinheiro
            $c += floor( ($restoOutros) / $regras['Valor'] );
            $restoOutros = ($restoOutros) % $regras['Valor']; //resto da divisao
        }
        $restoBandeira += $valorBandeira;
        if( $restoBandeira >= $regras['Valor'] ) {// trocar bandeira
            $c += floor( ($restoBandeira) / $regras['Valor'] ) * $regras['Bandeira']['valor'];
            $restoBandeira = ($restoBandeira) % $regras['Valor']; //resto da divisao
        }//debug('rd = ' . $restoOutros .' rb = ' . $restoBandeira .' c = ' . $c);
        if( ($restoOutros + $restoBandeira) >= $regras['Valor'] ) {//troca os restinhos
            $c++;
            $restoBandeira = ($restoOutros + $restoBandeira) - $regras['Valor']; //restinho final
            $restoOutros = 0;
        }//debug('rd = ' . $restoOutros .' rb = ' . $restoBandeira .' c = ' . $c);

        //criar os cupons promocionais
        for ($i = 0; $i < $c; $i++) {
            $this->data['CupomPromocional'][$i]['promotor_id'] = $this->data['Troca']['promotor_id'];
            $this->data['CupomPromocional'][$i]['consumidor_id'] = $this->data['Troca']['consumidor_id'];
        }
        //dados extras para colocar na troca e economizar processamento nos SELECTs
        $this->data['Troca']['qtd_cf'] = count($this->data['CupomFiscal']);
        $this->data['Troca']['valor_total'] = $valorBandeira +  $valorOutros;
        $this->data['Troca']['valor_bandeira'] = $valorBandeira;
        $this->data['Troca']['valor_outros'] = $valorOutros;
        $this->data['Troca']['qtd_cp'] = (int)$c;

        return array(
                'valorOutros' => $valorOutros,
                'restoOutros' => $restoOutros,
                'valorBandeira' => $valorBandeira,
                'restoBandeira' => $restoBandeira,
                'qtd_CP' => (int)$c);
    }


    function _imprimirCP() {
        $CPimpresso = 0;
        for ($i = 0; $i < $this->data['Troca']['qtd_cp']; $i++) {
            //TODO: metodo q manda para impressora e detecta se imprimiu corretamente, ou só mostra os pdfs
            $CPimpresso++;
        }
        if($CPimpresso == $this->data['Troca']['qtd_cp']) {//debug("impressos = " . $CPimpresso);
            $this->Session->setFlash('Impressos '.$CPimpresso.' cupons.', 'default', null, 'Impressora');
        }else {
            $this->Session->setFlash(($totalCP - $CPimpresso) . ' cupons impressos errados.', 'default', null, 'Impressora');
        }
    }


    function _atualizaSaldo($valoresCP) {//debug($valoresCP);
        $data_consumidor = array(
                'Consumidor' => array(
                        'updated' => false,
                        'saldo_outros' => $valoresCP['restoOutros'],
                        'saldo_bandeira' => $valoresCP['restoBandeira']
        ));
        $params_consumidor = array(
                'validate' => false,
                'fieldList' => array('saldo_bandeira', 'saldo_outros'),
                'callbacks' => false
        );
        $this->Troca->Consumidor->save($data_consumidor, $params_consumidor);
    }


    ///////////////////
    //funcoes nao mais utilizadas
    ///////////////////
    /*
    function _calculaCP($cfs) {

        $pontos = $this->_calculaPontosTotal($cfs);

        $totalCP = $pontos/Configure::read('Regras.Pontos');
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
            $pontos = $valor*Configure::read('Regras.Credito.Visa');
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

    function _calculaSaldo($pontos) {
        return $pontos%Configure::read('Regras.Pontos');
    }
 * 
    */

    ////////////////////////////////////////
    ////////////////////////
    ////
    //// RELATORIOS
    ////
    ////////////////////////
    ////////////////////////////////////////


    function hoje() {
        //buscar trocas de hoje
        $inicio = date('Y-m-d', strtotime("-0 days"));
        $conditions_data_troca = array("Troca.created > " => $inicio);
        $conditions_data_consumidor = array("Consumidor.created > " => $inicio);
        $conditions_data_cf = array("CupomFiscal.created > " => $inicio);
        $conditions_data_cp = array("CupomPromocional.created > " => $inicio);

        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50,
                'recursive' => 0
        );
        $trocas = $this->paginate('Troca');


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

        //.Média ticket compra (Media de cada troca e de cada cupom fiscal)
        $media = $media_valor_troca = 0; //para evitar divisao por zero a seguir
        if($count_trocas != 0) {
            //.Média ticket compra
            $media_valor_troca = number_format($valor_cupons_fiscais[0]['total']/$count_trocas, 2);

            //.media de valor dos cupons fiscais
            $media = number_format($valor_cupons_fiscais[0]['total']/$num_cupons_fiscais, 2);
        }

        ////////////////
        //dados relacionados a campanhas com bandeira promocional
        ////////////////

        //.Quantidade de consumidores que compraram com Bandeira da promoção (VISA/MASTER)
        $num_consumidores_bandeira = $this->_num_consumidores_bandeira($inicio);
        //debug($num_consumidores_VISA);

        //.Quantidade de consumidores que compraram sem VISA/MASTER
        $num_consumidores_not_bandeira = $this->_num_consumidores_not_bandeira($inicio);
        //debug($num_consumidores_not_bandeira);

        //.Quantidade de consumidores novos que compraram com VISA/MASTER
        $num_consumidores_novos_bandeira = $this->_num_consumidores_novos_bandeira($inicio);
        //debug($num_consumidores_novos_bandeira);

        //.Quantidade de consumidores novos que compraram sem VISA/MASTER
        $num_consumidores_novos_not_bandeira = $this->_num_consumidores_novos_not_bandeira($inicio);
        //debug($num_consumidores_novos_not_bandeira);


        $this->set(compact('trocas',
                'count_trocas', 'media_valor_troca', 'total_pontos',
                'num_consumidores_atendidos', 'num_consumidores_novos',
                'valor_cupons_fiscais', 'num_cupons_fiscais', 'media',
                'num_cupons_promocionais',
                'num_consumidores_bandeira', 'num_consumidores_not_bandeira',
                'num_consumidores_novos_bandeira', 'num_consumidores_novos_not_bandeira'));
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


        ////////////////
        //dados relacionados a campanhas com bandeira promocional
        ////////////////

        //.Quantidade de consumidores que compraram com Bandeira da promoção (VISA/MASTER)
        $num_consumidores_bandeira = $this->_num_consumidores_bandeira($inicio, $fim);

        //.Quantidade de consumidores que compraram sem VISA/MASTER
        $num_consumidores_not_bandeira = $this->_num_consumidores_not_bandeira($inicio, $fim);

        //.Quantidade de consumidores novos que compraram com VISA/MASTER
        $num_consumidores_novos_bandeira = $this->_num_consumidores_novos_bandeira($inicio, $fim);

        //.Quantidade de consumidores novos que compraram sem VISA/MASTER
        $num_consumidores_novos_not_bandeira = $this->_num_consumidores_novos_not_bandeira($inicio, $fim);


        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50,
                'recursive' => 0
        );
        $trocas = $this->paginate('Troca');

        $this->set(compact('trocas',
                'count_trocas', 'media_valor_troca', 'total_pontos',
                'num_consumidores_atendidos', 'num_consumidores_novos',
                'valor_cupons_fiscais', 'num_cupons_fiscais', 'media',
                'num_cupons_promocionais',
                'num_consumidores_bandeira', 'num_consumidores_not_bandeira', 'num_consumidores_novos_bandeira', 'num_consumidores_novos_not_bandeira'));

    }

    function semana() {
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


        ////////////////
        //dados relacionados a campanhas com bandeira promocional
        ////////////////

        //.Quantidade de consumidores que compraram com Bandeira da promoção (VISA/MASTER)
        $num_consumidores_bandeira = $this->_num_consumidores_bandeira($inicio);

        //.Quantidade de consumidores que compraram sem VISA/MASTER
        $num_consumidores_not_bandeira = $this->_num_consumidores_not_bandeira($inicio);

        //.Quantidade de consumidores novos que compraram com VISA/MASTER
        $num_consumidores_novos_bandeira = $this->_num_consumidores_novos_bandeira($inicio);

        //.Quantidade de consumidores novos que compraram sem VISA/MASTER
        $num_consumidores_novos_not_bandeira = $this->_num_consumidores_novos_not_bandeira($inicio);


        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50,
                'recursive' => 0
        );
        $trocas = $this->paginate('Troca');

        $this->set(compact('trocas',
                'count_trocas', 'media_valor_troca', 'total_pontos',
                'num_consumidores_atendidos', 'num_consumidores_novos',
                'valor_cupons_fiscais', 'num_cupons_fiscais', 'media',
                'num_cupons_promocionais',
                'num_consumidores_bandeira', 'num_consumidores_not_bandeira', 'num_consumidores_novos_bandeira', 'num_consumidores_novos_not_bandeira'));

    }

    function mes() {
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

        ////////////////
        //dados relacionados a campanhas com bandeira promocional
        ////////////////
        //.Quantidade de consumidores que compraram com Bandeira da promoção (VISA/MASTER)
        $num_consumidores_bandeira = $this->_num_consumidores_bandeira($inicio);
        //.Quantidade de consumidores que compraram sem VISA/MASTER
        $num_consumidores_not_bandeira = $this->_num_consumidores_not_bandeira($inicio);
        //.Quantidade de consumidores novos que compraram com VISA/MASTER
        $num_consumidores_novos_bandeira = $this->_num_consumidores_novos_bandeira($inicio);
        //.Quantidade de consumidores novos que compraram sem VISA/MASTER
        $num_consumidores_novos_not_bandeira = $this->_num_consumidores_novos_not_bandeira($inicio);

        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50,
                'recursive' => 0
        );
        $trocas = $this->paginate('Troca');

        $this->set(compact('trocas',
                'count_trocas', 'media_valor_troca', 'total_pontos',
                'num_consumidores_atendidos', 'num_consumidores_novos',
                'valor_cupons_fiscais', 'num_cupons_fiscais', 'media',
                'num_cupons_promocionais',
                'num_consumidores_bandeira', 'num_consumidores_not_bandeira', 'num_consumidores_novos_bandeira', 'num_consumidores_novos_not_bandeira'));
    }



    function _num_consumidores_bandeira($inicio, $fim = null ) {
        if(is_null($fim)) {
            $fim = date('Y-m-d', strtotime("+1 days"));
        }
        $conditionsSubQuery = array(
                'CF.bandeira' => Configure::read('Regras.Bandeira.nome'),
                //'CF.forma_de_pagamento' => 'Credito',,//se interessar somente credito ou debito
                'CF.created BETWEEN ? AND ? ' => array($inicio,$fim));
        $dbo = $this->CupomFiscal->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this->CupomFiscal),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),//retirar essas condições null?
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this->CupomFiscal
        );
        $subQuery_num_consumidores_bandeira = ' Troca.id IN ( ' . $subQuery .' ) ';
        //debug($subQuery_num_consumidores_bandeira);
        $conditions_num_consumidores_bandeira = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_bandeira,
                'recursive' => -1
        );
        return $this->Troca->find('count', $conditions_num_consumidores_bandeira );
    }

    function _num_consumidores_not_bandeira($inicio, $fim = null) {
        if(is_null($fim)) {
            $fim = date('Y-m-d', strtotime("+1 days"));
        }
        $conditionsSubQuery = array(
                'NOT' => array(
                        'AND' => array(
                                'CF.bandeira' => Configure::read('Regras.Bandeira.nome')
                        )),
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
        $subQuery_num_consumidores_not_bandeira = ' Troca.id IN ( ' . $subQuery .' ) ';
        //debug($subQuery_num_consumidores_not_bandeira);
        $conditions_num_consumidores_not_bandeira = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_not_bandeira,
                'recursive' => -1
        );
        return $this->Troca->find('count', $conditions_num_consumidores_not_bandeira );
    }

    function _num_consumidores_novos_bandeira($inicio, $fim = null) {
        if(is_null($fim)) {
            $fim = date('Y-m-d', strtotime("+1 days"));
        }
        $conditionsSubQuery = array(
                'CF.bandeira' => Configure::read('Regras.Bandeira.nome'),
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
        $subQuery_num_consumidores_novos_bandeira = ' Troca.id IN ( ' . $subQuery .' ) AND Troca.consumidor_id IN ( '. $subQuery2 .' )';
        //debug($subQuery_num_consumidores_novos_bandeira);
        $conditions_num_consumidores_novos_bandeira = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_novos_bandeira,
                'recursive' => -1
        );
        return $this->Troca->find('count', $conditions_num_consumidores_novos_bandeira );
    }


    function _num_consumidores_novos_not_bandeira($inicio, $fim = null) {
        if(is_null($fim)) {
            $fim = date('Y-m-d', strtotime("+1 days"));
        }
        $conditionsSubQuery = array(
                'CF.bandeira' => Configure::read('Regras.Bandeira.nome'),
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
        $subQuery_num_consumidores_novos_not_bandeira =
                ' Troca.id IN ( ' . $subQuery .' )
            AND Troca.consumidor_id IN ( '. $subQuery2 .' )';
        //debug($subQuery_num_consumidores_novos_not_bandeira);
        $conditions_num_consumidores_novos_not_bandeira = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $subQuery_num_consumidores_novos_not_bandeira,
                'recursive' => -1
        );
        return $this->Troca->find('count', $conditions_num_consumidores_novos_not_bandeira );
    }


}
?>