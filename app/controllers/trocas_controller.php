<?php
/**
 * @property Troca $Troca
 * @property CupomPromocional $CupomPromocional
 * @property CupomFiscal $CupomFiscal
 * @property Consumidor $Consumidor
 * @property Brinde $Brinde
 */
class TrocasController extends AppController {

    var $name = 'Trocas';
    var $helpers = array('Html', 'Form', 'Javascript', 'CakePtbr.Formatacao');

    var $uses = array('Troca','CupomPromocional', 'CupomFiscal','Brinde', 'Premio');


    function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('escolher_brinde','concluida');
    }

    function index() {
        $this->Troca->recursive = 0;
        $this->paginate = array(
                'order' => 'Troca.created DESC',
        );
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
        if(!$troca) {
            $this->Session->setFlash(__('Id da Troca Inválido', true));
            $this->redirect(array('action' => 'index'));
        }

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

        $brindes_disponiveis = $this->Brinde->_brindes_disponiveis( Configure::read('Regras.Brinde.max'), $consumidor['Consumidor']['brinde_count']);

            $this->set(compact('consumidor', 'promotor', 'brindes_disponiveis'));
        }else {
            $this->Session->setFlash('Pesquise o Consumidor antes de fazer a Troca');
            $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
        }

        if (!empty($this->data)) {//debug($this->data);
            //incluir Consumidor e Promotor na Troca
            $this->data['Troca']['promotor_id'] = $promotor['Promotor']['id'];
            $this->data['Troca']['consumidor_id'] = $consumidor['Consumidor']['id'];

            //incluir o Consumidor no CupomFiscal
            $numCF = count($this->data['CupomFiscal']);
            for ($i = 0; $i < $numCF; $i++) {
                $this->data['CupomFiscal'][$i]['consumidor_id'] = $consumidor['Consumidor']['id'];
            }

            if( Configure::read('Regras.Brinde.true') ) {//por enquanto continua usando, mas depois vai virar tudo premio
                $valores = $this->_calculaPremio();
                //$this->_calculaBrinde();//TODO
            }else {//por enquanto continua usando, mas depois vai virar tudo premio
                $valores = $this->_calculaCupomPromocional();//debug($valoresCP);
            }
            //debug($this->data);
            $this->data['Troca']['valor_total'] = str_replace(',','.',$this->data['Troca']['valor_total']);
            $this->data['Troca']['valor_bandeira'] = str_replace(',','.',$this->data['Troca']['valor_bandeira']);
            $this->data['Troca']['valor_outros'] = str_replace(',','.',$this->data['Troca']['valor_outros']);
            $this->Troca->create();
            if ($this->Troca->saveall($this->data, array('validate'=>'first'))) {//valida antes os cupoms
                $this->Session->setFlash(__('Troca efetuada com sucesso!', true));

                if( Configure::read('Regras.Saldo.acumular') ) {//debug($valoresCP);
                    $this->_atualizaSaldo($valores);
                }

                if( Configure::read('Regras.Brinde.true') ) {
                    $this->redirect(array('controller'=>'trocas', 'action' => 'escolher_brinde/' . $this->Troca->id),null,true);
                }else {
                    $this->redirect(array('controller'=>'trocas', 'action' => 'concluida/' . $this->Troca->id),null,true);
                }

            } else {
                $this->Session->setFlash(__('A Troca não foi efetuda. Verifique os erros por favor.', true));
            }
        }
        $lojas = $this->Troca->CupomFiscal->Loja->find('list', array('fields' => array('Loja.nome_fantasia'),'conditions'=>array('Loja.id > '=>'1')));
        $lojas_razao_social = $this->Troca->CupomFiscal->Loja->find('list', array('fields' => array('Loja.razao_social')));
        $this->set(compact('lojas', 'lojas_razao_social'));
    }

    function escolher_brinde($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Troca inválida', true));
            $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
        }

        $this->Troca->recursive = 1;
        $troca = $this->Troca->read(null, $id);//debug($troca);
        $consumidor['Consumidor'] = $troca['Consumidor'];//para usar $this->element('consumidor') na view

        $this->Troca->Premio->recursive = -1;
        $premios = $this->Troca->Premio->find('all',array('conditions'=>array('troca_id'=>$id),'fields'=>'id' ));//debug($premios);

        $this->Brinde->recursive = -1;
        $estoques = $this->Brinde->find('list',array('fields'=>array('id','estoque_atual') ));//debug($estoques);

        $brindes_disponiveis = $this->Brinde->_brindes_disponiveis( $troca['Troca']['qtd_premios'], $consumidor['Consumidor']['brinde_count']);

        $brindes = $this->Brinde->find('list');//debug($brindes);
        $this->set(compact('brindes','estoques','premios','troca', 'consumidor','brindes_disponiveis'));
    }


    function salvar_brinde($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Troca inválida', true));
            $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
        }

        $this->Troca->recursive = 1;
        $troca = $this->Troca->read(null, $id);//debug($troca);

        $brindes_disponiveis = $this->Brinde->_brindes_disponiveis( $troca['Troca']['qtd_premios'], $troca['Consumidor']['brinde_count']);
        $this->Brinde->recursive = -1;
        $estoques = $this->Brinde->find('list',array('fields'=>array('id','estoque_atual') ));//debug($estoques);

        if (!empty($this->data)) { //debug($this->data);
            $estoqueSuficiente = true;
            $i=$j=0;
            foreach ($this->data['Premio']['foreign_key'] as $foreign_key => $qtd) {

                if( ($qtd > $estoques[$foreign_key]) && $estoqueSuficiente ) {
                    $estoqueSuficiente = false;
                }

                for($k=0; $k<$qtd; $k++) {
                    $premios[$i]["Premio"]['foreign_key'] = $foreign_key;
                    $premios[$i]["Premio"]['model'] = 'Brinde';
                    $premios[$i]["Premio"]['troca_id'] = $id;
                    $premios[$i]["Premio"]['consumidor_id'] = $troca['Consumidor']['id'];
                    $premios[$i]["Premio"]['promotor_id'] = $troca['Promotor']['id'];
                    $i++;
                }
                if($qtd >= 1) {//se foi escolhido um brindde do tipo, coloca no array para atualizar o estoque
                    $brindes[$j]['brinde_id'] = $foreign_key;
                    $brindes[$j]['qtd'] = ((int)$qtd )*(-1);//subtrair do estoque
                    $j++;
                }
            } //debug($premios);debug($brindes);

            if( $estoqueSuficiente ) {
                if ($this->Troca->Premio->saveAll($premios)) {
                    $this->Troca->atualizarQtdPremiosTrocados(count($premios));
                    $this->Troca->Consumidor->_atualizarBrindeCount($troca['Consumidor']['id'],$brindes_disponiveis);
                    $this->Brinde->_atualizarAllEstoque($brindes);

                    $this->Session->setFlash(__('Troca concluída com sucesso.', true));
                    $this->redirect(array('controller'=>'trocas', 'action' => 'concluida/' . $this->Troca->id),null,true);
                } else {
                    $this->Session->setFlash(__('Ocorreu algum erro, tente novamente por favor.', true));
                    $this->redirect(array('controller'=>'trocas', 'action' => 'escolher_brinde/' . $this->Troca->id),null,true);
                }
            }else {
                $this->Session->setFlash(__('Quantidade escolhida maior que estoque atual. Escolha outro Brinde.', true));
                $this->redirect(array('controller'=>'trocas', 'action' => 'escolher_brinde/' . $this->Troca->id),null,true);
            }
        }
    }

    function concluida($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Troca inválida', true));
            $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
        }
        $this->Troca->recursive = 0;
        $troca = $this->Troca->read(null, $id);//debug($troca);

        $consumidor['Consumidor'] = $troca['Consumidor'];//debug($consumidor);

        $this->set(compact('troca', 'consumidor'));
    }
    /*
    function imprimir($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Troca', true));
            $this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
        }
        $this->Troca->recursive = 1;
        $troca = $this->Troca->read(null, $id);//debug($troca);

        $consumidor['Consumidor'] = $troca['Consumidor'];//debug($consumidor);

        $this->set(compact('troca', 'consumidor'));
    }
     *
    */

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
     * TODO: mudar essa funcao para o model CupomPromocional?
     *
     * @return array    array associativo(valorOutros, restoOutros, valorBandeira, restoBandeira, qtd_CP)
     */
    function _calculaCupomPromocional() {
        $c = $valorOutros = $valorBandeira = $restoOutros = $restoBandeira = 0;
        $regras = Configure::read('Regras');//debug($regras);

        if($regras['Saldo']['gastar']) {
            $restoBandeira = $this->Troca->Consumidor->data['Consumidor']['saldo_bandeira'];//debug('saldo_bandeira anterior = ' . $restoBandeira );
            $restoOutros = $this->Troca->Consumidor->data['Consumidor']['saldo_outros'];//debug('saldo_outros anterior = ' . $restoOutros);
        }
        //soma os valores dos cupons fiscais enviados
        $valores = $this->CupomFiscal->_somaValorCFs($this->data['CupomFiscal']);
        $valorBandeira = $valores['valorBandeira'];
        $valorOutros = $valores['valorOutros'];

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

        if($this->data['Troca']['juntar_saldos'] == 'true') {
            if( ($restoOutros + $restoBandeira) >= $regras['Valor'] ) {//troca os restinhos
                $c++;
                $restoBandeira = ($restoOutros + $restoBandeira) - $regras['Valor']; //restinho final
                $restoOutros = 0;
            }//debug('rd = ' . $restoOutros .' rb = ' . $restoBandeira .' c = ' . $c);
        }

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

        if($regras['Saldo']['acumular']) {
            $restoBandeira += $this->Troca->Consumidor->data['Consumidor']['saldo_bandeira'];
            $restoOutros += $this->Troca->Consumidor->data['Consumidor']['saldo_outros'];
        }

        return array(
                'valorOutros' => $valorOutros,
                'restoOutros' => $restoOutros,
                'valorBandeira' => $valorBandeira,
                'restoBandeira' => $restoBandeira,
                'qtd_CP' => (int)$c);
    }

    /**
     * Soma os cupons fiscais de acordo com o tipo de compra e calcula a quantidade de premios
     * e o resto
     * TODO: mudar essa funcao para o model Premio?
     *
     * @return array    array associativo(valorOutros, restoOutros, valorBandeira, restoBandeira, qtd_premios)
     */
    function _calculaPremio() {
        $c = $valorOutros = $valorBandeira = $restoOutros = $restoBandeira = 0;
        $regras = Configure::read('Regras');//debug($regras);

        if($regras['Saldo']['true']) {
            $restoBandeira = $this->Troca->Consumidor->data['Consumidor']['saldo_bandeira'];//debug('saldo_bandeira anterior = ' . $restoBandeira );
            $restoOutros = $this->Troca->Consumidor->data['Consumidor']['saldo_outros'];//debug('saldo_outros anterior = ' . $restoOutros);
        }

        //soma os valores dos cupons fiscais enviados
        $valores = $this->CupomFiscal->_somaValorCFs($this->data['CupomFiscal']);
        $valorBandeira = $valores['valorBandeira'];
        $valorOutros = $valores['valorOutros'];

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

        if($this->data['Troca']['juntar_saldos'] == 'true') {
            if( ($restoOutros + $restoBandeira) >= $regras['Valor'] ) {//troca os restinhos
                $c++;
                $restoBandeira = ($restoOutros + $restoBandeira) - $regras['Valor']; //restinho final
                $restoOutros = 0;
            }//debug('rd = ' . $restoOutros .' rb = ' . $restoBandeira .' c = ' . $c);
        }

        //TODO: quando refatorar para unir cupompromocional e brindes como Premios
        //pode ser necessario o incluir os premios ja ao salvar a troca
//        for ($i = 0; $i < $c; $i++) {//criar os Premios
//            $this->data['Premio'][$i]['promotor_id'] = $this->data['Troca']['promotor_id'];
//            $this->data['Premio'][$i]['consumidor_id'] = $this->data['Troca']['consumidor_id'];
//            if( Configure::read('Regras.Brinde.true') ) {
//                $this->data['Premio'][$i]['model']='';
//                $this->data['Premio'][$i]['foreign_key']='';
//            }
//        }
        //dados extras para colocar na troca e economizar processamento nos SELECTs
        $this->data['Troca']['qtd_cf'] = count($this->data['CupomFiscal']);
        $this->data['Troca']['valor_total'] = $valorBandeira +  $valorOutros;
        $this->data['Troca']['valor_bandeira'] = $valorBandeira;
        $this->data['Troca']['valor_outros'] = $valorOutros;
        $this->data['Troca']['qtd_premios'] = (int)$c;

        return array(
                'valorOutros' => $valorOutros,
                'restoOutros' => $restoOutros,
                'valorBandeira' => $valorBandeira,
                'restoBandeira' => $restoBandeira,
                'qtd_premios' => (int)$c);
    }
    /**
     * Atualiza o saldo do consumidor
     * TODO: mudar essa funcao para o model Consumidor? afterSave talvez?
     *
     * @see function _calculaCupomPromocional()
     *
     * @param array $valoresCP (valorOutros, restoOutros, valorBandeira, restoBandeira, qtd_CP)
     */
    function _atualizaSaldo($valoresCP) {//debug($valoresCP);
        $data_consumidor = array(
                'Consumidor' => array(
                        'updated' => false,
                        'saldo_outros' => str_replace(',','.',$valoresCP['restoOutros']),
                        'saldo_bandeira' => str_replace(',','.',$valoresCP['restoBandeira'])
        ));
        $params_consumidor = array(
                'validate' => false,
                'fieldList' => array('saldo_bandeira', 'saldo_outros'),
                'callbacks' => false
        );
        $this->Troca->Consumidor->save($data_consumidor, $params_consumidor);
    }

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
        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50,
                'order' => 'Troca.created DESC',
                'recursive' => 0
        );
        $trocas = $this->paginate('Troca');


        $relatorio = $this->Troca->CupomFiscal->_buscaRelatorioTrocas($inicio);

        $this->set(compact('trocas','relatorio'));

        if( Configure::read('Regras.Brinde.true') ) {
            $this->Premio = ClassRegistry::init('Premio');
            $premios_dia = $this->Premio->_premiosPeriodo($inicio);//debug($premios_dia);
            $this->set('premios_dia', $premios_dia);
        }
    }

    function semana() {
        $inicio = date('Y-m-d', strtotime("-1 week"));
        $conditions_data_troca = array("Troca.created > " => $inicio);
        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50,
                'order' => 'Troca.created DESC',
                'recursive' => 0
        );
        $trocas = $this->paginate('Troca');


        $relatorio = $this->Troca->CupomFiscal->_buscaRelatorioTrocas($inicio);

        $this->set(compact('trocas','relatorio'));

        if( Configure::read('Regras.Brinde.true') ) {
            $this->Premio = ClassRegistry::init('Premio');
            $fim =  date('Y-m-d', strtotime("-0 days"));
            $premios_dia = $this->Premio->_premiosPeriodo($inicio, $fim);//debug($premios_dia);
            $this->set('premios_dia', $premios_dia);
        }

    }

    function mes() {
        $inicio = date('Y-m-d', strtotime("-1 month"));
        $conditions_data_troca = array("Troca.created > " => $inicio);
        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50,
                'order' => 'Troca.created DESC',
                'recursive' => 0
        );
        $trocas = $this->paginate('Troca');


        $relatorio = $this->Troca->CupomFiscal->_buscaRelatorioTrocas($inicio);

        $this->set(compact('trocas','relatorio'));

        if( Configure::read('Regras.Brinde.true') ) {
            $this->Premio = ClassRegistry::init('Premio');
            $fim =  date('Y-m-d', strtotime("-0 days"));
            $premios_dia = $this->Premio->_premiosPeriodo($inicio, $fim);//debug($premios_dia);
            $this->set('premios_dia', $premios_dia);
        }
    }


    function ontem() {
        $inicio = date('Y-m-d', strtotime("-1 days"));
        $fim =  date('Y-m-d', strtotime("-0 days"));
        $conditions_data_troca = array("Troca.created > " => $inicio);
        $this->paginate = array(
                'conditions' => $conditions_data_troca,
                'limit' => 50,
                'order' => 'Troca.created DESC',
                'recursive' => 0
        );
        $trocas = $this->paginate('Troca');


        $relatorio = $this->Troca->CupomFiscal->_buscaRelatorioTrocas($inicio);

        $this->set(compact('trocas','relatorio'));
        
        if( Configure::read('Regras.Brinde.true') ) {
            $this->Premio = ClassRegistry::init('Premio');
            $fim =  date('Y-m-d', strtotime("-0 days"));
            $premios_dia = $this->Premio->_premiosPeriodo($inicio, $fim);//debug($premios_dia);
            $this->set('premios_dia', $premios_dia);
        }
        /*
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
         *
        */

    }

    ///////////////////
    //funcoes nao mais utilizadas
    ///////////////////
    /*
    function _imprimirCP() {
        $CPimpresso = 0;
        $cps = $this->Troca->CupomPromocional->find('all',array(
                'recursive' => -1,
                'conditions' => array( 'troca_id' => $this->Troca->id )
        ));

        foreach ($cps as $cp) {

        }
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
     *
    */
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

}
?>