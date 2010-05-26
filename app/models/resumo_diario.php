<?php
/**
 * @property DiaTroca $DiaTroca
 * @property ResumoDiario $ResumoDiario
 */
class ResumoDiario extends AppModel {

    var $name = 'ResumoDiario';



    /**
     * Mostra tabela com dados resumidos de cada dia da campanha
     */
    function atualizar() {
        //$this->DiaTroca->useTable = true;
        //$tabela = $this->tablePrefix ."dia_trocas";
        //$this->DiaTroca->table = $tabela;
        $this->DiaTroca = ClassRegistry::init('DiaTroca');
        $maxDia = $this->DiaTroca->getMaxDia();//field('dia', array(), 'dia DESC');//debug($maxDia);
        if ( $maxDia < date('Y-m-d') ) { //criar resumo de ontem, e dos dias anteriores se necessario
            $this->_atualizarResumoDiario($maxDia);//vai rodar somente 1 vez por dia, na primeira visita
        }
    }

    /**
     * Constroi os resumos ate o momento
     * a partir do ultimo feito
     */
    function _atualizarResumoDiario($maxDia) {
        $hoje = date('Y-m-d');
        $ontem = date('Y-m-d', strtotime($hoje . " -1 days") );
        $dia = $maxDia;
        //debug($dia);
        //debug($hoje);
        //debug($ontem);
        while ($dia < $ontem) {
            $dia = date('Y-m-d', strtotime($dia . " +1 days") );
            $this->_cronTrocasDia($dia);
            $this->_cronResumoDiario($dia);
        }
    }

    /**
     * Cria uma tabela com as trocas de um determinado dia, e mais alguns dados extras
     * Atencao: considera a data da troca e nao a data da compra
     * TODO: criar um _cronComprasDia? pode ser interessante para os lojistas
     *
     * @param String $dia   data no formato Y-m-d
     */
    function _cronTrocasDia($dia = null) {
        if(is_null($dia)) {
            $dia = date('Y-m-d');
        }

        $tabela = $this->tablePrefix ."trocas_".$dia;
        $sql = "CREATE TABLE IF NOT EXISTS `" . $tabela ."` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `troca_id` int(11) NOT NULL,
                      `dia` date NOT NULL,
                      `promotor_id` int(11) NOT NULL,
                      `consumidor_id` int(11) NOT NULL,
                      `consumidor_nome` varchar(255) NOT NULL,
                      `consumidor_created` date NOT NULL,
                      `qtd_cf` int(3) DEFAULT NULL,
                      `valor_total` float(10,2) DEFAULT '0',
                      `valor_bandeira` float(10,2) DEFAULT '0',
                      `valor_outros` float(10,2) DEFAULT '0',
                      `qtd_cp` int(5) DEFAULT '0',

                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
        //debug($sql);
        if($this->query($sql)) {
        }
        $this->DiaTroca->id = false;//para permitir multiples inserts
        $this->DiaTroca->save(array('DiaTroca'=>array('dia'=>$dia)));//salva na tabela dia_trocas

        $inicio = $dia;
        $fim =  date('Y-m-d', strtotime($dia . " +1 days"));
        $conditions_data_troca = array("Troca.created BETWEEN ? AND ?" => array($inicio,$fim));
        //.total de trocas efetuadas
        //$count_trocas = $this->Troca->find('count', array('conditions' => $conditions_data_troca));//debug($count_trocas);

        $this->Troca = ClassRegistry::init('Troca');
        $this->Troca->recursive = -1;
        $trocas = $this->Troca->findAll( $conditions_data_troca);//debug($trocas);

        $this->TrocasDia = ClassRegistry::init('TrocasDia');
        $this->TrocasDia->useTable = true;
        $this->TrocasDia->table = $this->tablePrefix . "trocas_".$dia; //troca para a tabela diaria
        foreach ($trocas as $troca) {
            $this->TrocasDia->id = false;//para permitir multiples inserts

            $diatroca['TrocasDia'] = $troca['Troca'];
            unset($diatroca['TrocasDia']['id']);//pegou o id da troca, unseta para usar o autoincrement
            $diatroca['TrocasDia']['troca_id'] = $troca['Troca']['id'];

            $this->Consumidor = ClassRegistry::init('Consumidor');
            $consumidor = $this->Consumidor->find(array('id'=>$troca['Troca']['consumidor_id']), array('nome','created'));
            $diatroca['TrocasDia']['consumidor_nome'] = $consumidor['Consumidor']['nome'];//debug($diatroca['TrocasDia']['consumidor_nome']);
            $diatroca['TrocasDia']['consumidor_created'] = $consumidor['Consumidor']['created'];//debug($diatroca['TrocasDia']['consumidor_nome']);
            $diatroca['TrocasDia']['dia'] = $dia;

            $this->TrocasDia->save($diatroca);
        }
    }

    /**
     * insere o resumo das trocas de um determinado dia na tabela RESUMODIARIO
     *
     * @param <type> $dia
     */
    function _cronResumoDiario($dia = null) {
        $inicio = date('Y-m-d', strtotime($dia . " -1 days"));
        $fim =  $dia;

        $this->TrocasDia->recursive = -1;
        $this->TrocasDia->useTable = true;
        $this->TrocasDia->table = $this->tablePrefix . "trocas_".$dia; //troca para a tabela diaria
        //dia
        $resumodiario['ResumoDiario']['dia'] = $dia;

        //qtd_consumidores = select distinct
        $resumodiario['ResumoDiario']['qtd_consumidores'] = $this->TrocasDia->find('count', "COUNT(DISTINCT TrocasDia.consumidor_id) AS 'count'");
        if(is_null($resumodiario['ResumoDiario']['qtd_consumidores'])) $resumodiario['ResumoDiario']['qtd_consumidores'] = 0;

        //qtd_consumidores novos = select distinct join copnsumidores
        $conditions_num_consumidores_novos_bandeira = array(
                'fields' => "COUNT(DISTINCT TrocasDia.consumidor_id) AS 'count'",
                'conditions' => array('TrocasDia.consumidor_created BETWEEN ? AND ? ' => array($inicio,$fim)),
                'recursive' => -1
        );
        $resumodiario['ResumoDiario']['qtd_consumidores_novos'] = $this->TrocasDia->find('count', $conditions_num_consumidores_novos_bandeira );

        //qtd_cupons_fiscais
        $qtd_cf = $this->TrocasDia->find('all', array('fields'=>array("SUM(TrocasDia.qtd_cf) AS 'total_qtd_cf'")));//debug($qtd_cf);
        if(!isset($qtd_cf[0]['TrocasDia']['total_qtd_cf'])) {
            $resumodiario['ResumoDiario']['qtd_cupons_fiscais'] = 0;
        }else {
            if(is_null($qtd_cf[0]['TrocasDia']['total_qtd_cf'])) {
                $resumodiario['ResumoDiario']['qtd_cupons_fiscais'] = 0;
            }else {
                $resumodiario['ResumoDiario']['qtd_cupons_fiscais'] = $qtd_cf[0]['TrocasDia']['total_qtd_cf'];
            }
        }

        //qtd_cupons_promocionais
        $qtd_cp = $this->TrocasDia->find('all', array('fields'=>array("SUM(TrocasDia.qtd_cp) AS 'total_qtd_cp'")));//debug($qtd_cp);
        $resumodiario['ResumoDiario']['qtd_cupons_promocionais'] = $qtd_cp[0]['TrocasDia']['total_qtd_cp'];

        //valor_total 	float
        $valor_total = $this->TrocasDia->find('all', array('fields'=>array("SUM(TrocasDia.valor_total) AS 'valor_total'")));
        //debug($valor_total);
        //if(is_null($valor_total['TrocasDia']['valor_total'])) $valor_total['TrocasDia']['valor_total'] = 0;
        if(is_null($valor_total[0]['TrocasDia']['valor_total'])) {
            $resumodiario['ResumoDiario']['valor_total'] = 0;
        }else {
            $resumodiario['ResumoDiario']['valor_total'] = $valor_total[0]['TrocasDia']['valor_total'];
        }

        //valor_bandeira 	float
        $valor_bandeira = $this->TrocasDia->find('all', array('fields'=>array("SUM(TrocasDia.valor_bandeira) AS 'valor_bandeira'")));
        if(is_null($valor_bandeira[0]['TrocasDia']['valor_bandeira'])) {
            $resumodiario['ResumoDiario']['valor_bandeira'] = 0;
        }else {
            $resumodiario['ResumoDiario']['valor_bandeira'] = $valor_bandeira[0]['TrocasDia']['valor_bandeira'];
        }
        //debug('$valor_bandeira = '.$valor_bandeira[0]['valor_bandeira']);

        //valor-outros 	float
        $valor_outros = $this->TrocasDia->find('all', array('fields'=>array("SUM(TrocasDia.valor_outros) AS 'valor_outros'")));
        if(is_null($valor_outros[0]['TrocasDia']['valor_outros'])) {
            $resumodiario['ResumoDiario']['valor_outros'] = 0;
        }else {
            $resumodiario['ResumoDiario']['valor_outros'] = $valor_outros[0]['TrocasDia']['valor_outros'];
        }
        //debug('$valor_outros = '.$valor_outros[0]['valor_outros']);

        //ticket_medio_consumidor
        if($resumodiario['ResumoDiario']['valor_total'] == 0 || $resumodiario['ResumoDiario']['qtd_consumidores'] == 0) {
            $resumodiario['ResumoDiario']['ticket_medio_consumidor'] = 0;
        }else {
            $resumodiario['ResumoDiario']['ticket_medio_consumidor'] = number_format($resumodiario['ResumoDiario']['valor_total']/$resumodiario['ResumoDiario']['qtd_consumidores'],2, '.', '');
            //debug('$ticket_medio_consumidor = '.$ticket_medio_consumidor);
        }

        //ticket_medio_cupom_fiscal
        if($resumodiario['ResumoDiario']['valor_total'] == 0 || $resumodiario['ResumoDiario']['qtd_cupons_fiscais'] == 0) {
            $resumodiario['ResumoDiario']['ticket_medio_cupom_fiscal'] = 0;
        }else {
            $resumodiario['ResumoDiario']['ticket_medio_cupom_fiscal'] = number_format($resumodiario['ResumoDiario']['valor_total']/$resumodiario['ResumoDiario']['qtd_cupons_fiscais'],2, '.', '');
            //debug('$ticket_medio_cupom_fiscal = '.$ticket_medio_cupom_fiscal);
        }

        //debug($resumodiario);
        $this->id = false;//para permitir multiples inserts
        $this->save($resumodiario);
    }

    /**
     * Constroi os resumos ate o momento
     * Atencao: vai destruir resumos ja calculados, usar somente se extremamente necessario!
     * TODO
     */
    function rebuildResumoDiario() {
        //from (primeiro dia da campanha) até ontem //20min
        //$this->_cronResumoDiario($dia);
    }

    function _totais() {
        $totais = $this->find('all', array(
                'fields' => array(
                        "SUM(qtd_consumidores) AS 'qtd_consumidores_total'",
                        "SUM(qtd_consumidores_novos) AS 'qtd_consumidores_novos_total'",
                        "SUM(qtd_cupons_fiscais) AS 'qtd_cupons_fiscais_total'",
                        "SUM(qtd_cupons_promocionais) AS 'qtd_cupons_promocionais_total'",
                        "SUM(ticket_medio_consumidor) AS 'ticket_medio_consumidor_total'",
                        "SUM(ticket_medio_cupom_fiscal) AS 'ticket_medio_cupom_fiscal_total'",
                        "SUM(valor_total) AS 'valor_total_total'",
                        "SUM(valor_bandeira) AS 'valor_bandeira_total'",
                        "SUM(valor_outros) AS 'valor_outros_total'",
        )));
        return $totais[0];
    }

}
?>