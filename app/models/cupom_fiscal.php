<?php
/**
 * @property Troca $Troca
 * @property Consumidor $Consumidor
 */
class CupomFiscal extends AppModel {

    var $name = 'CupomFiscal';
    var $validate = array(
            //'codigo' => array(
            //                'rule' => 'isUnique',
            //                'message' => 'Este cupom já foi cadastrado'
            //),
            'codigo' => array('notempty'),
            //'troca_id' => array('numeric'),
            'loja_id' => array('numeric'),
            'forma_de_pagamento' => array('notempty'),
            'valor' => array(
                            'rule' => '/^([0-9])+((,|\.)[0-9]{2})?$/i',
                            'message' => 'Formato correto: 00000,00'
                            //'rule' => array('decimal', 2)
            ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
            'Troca' => array(
                            'className' => 'Troca',
                            'foreignKey' => 'troca_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
            ),
            'Loja' => array(
                            'className' => 'Loja',
                            'foreignKey' => 'loja_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
            ),
            'Consumidor' => array(
                            'className' => 'Consumidor',
                            'foreignKey' => 'consumidor_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
            )
    );


    /**
     * Retorna dados da campanha
     *
     * TODO: diminuir o numero de queries
     *
     * @param date $inicio
     * @param date $fim
     * @return array    $relatorio  array com dados relativos a campanha
     */
    function _buscaRelatorioTrocas($inicio = null, $fim = null) {
        if(is_null($inicio)) $inicio = date('Y-m-d');
        if(is_null($fim)) {
            $conditions_data_troca = array("Troca.created > " => $inicio);
            $conditions_data_consumidor = array("Consumidor.created > " => $inicio);
            $conditions_data_cf = array("CupomFiscal.created > " => $inicio);
            $conditions_data_cp = array("CupomPromocional.created > " => $inicio);
        }else {
            $conditions_data_troca = array("Troca.created BETWEEN ? AND ?" => array($inicio,$fim));
            $conditions_data_consumidor = array("Consumidor.created BETWEEN ? AND ?" => array($inicio,$fim));
            $conditions_data_cf = array("CupomFiscal.created BETWEEN ? AND ?" => array($inicio,$fim));
            $conditions_data_cp = array("CupomPromocional.created BETWEEN ? AND ?" => array($inicio,$fim));
        }
        //.total de trocas efetuadas
        $relatorio['count_trocas'] = $this->Troca->find('count', array('conditions' => $conditions_data_troca));
        //.Numero consumidores atendidos
        $conditions_num_consumidores_atendidos = array(
                'fields' => "COUNT(DISTINCT Troca.consumidor_id) AS 'count'",
                'conditions' => $conditions_data_troca
        );
        $relatorio['num_consumidores_atendidos'] = $this->Troca->find('count', $conditions_num_consumidores_atendidos );
        //.Cupons Fiscais Diarios (R$)
        $conditions_valor_cupons_fiscais = array(
                'fields' => "SUM(CupomFiscal.valor) AS 'total'",
                'conditions' => $conditions_data_troca
        );
        $valor_cupons_fiscais = $this->find('first', $conditions_valor_cupons_fiscais);
        $relatorio['valor_cupons_fiscais'] = $valor_cupons_fiscais['CupomFiscal']['total'];//alias
        //.Numero consumidores novos
        $conditions_num_consumidores_novos = array(
                'conditions' => $conditions_data_consumidor
        );
        $relatorio['num_consumidores_novos'] = $this->Consumidor->find('count', $conditions_num_consumidores_novos);
        //.Numero de cupons fiscais trocados
        $conditions_num_cupons_fiscais = array(
                'conditions' => $conditions_data_cf
        );
        $relatorio['num_cupons_fiscais'] = $this->Troca->CupomFiscal->find('count', $conditions_num_cupons_fiscais);
        //.Quantidade de cupons promocionais impressos
        $conditions_num_cupons_promocionais = array(
                'conditions' => $conditions_data_cp
        );
        $relatorio['num_cupons_promocionais'] = $this->Troca->CupomPromocional->find('count', $conditions_num_cupons_promocionais);
        //medias
        $relatorio['media'] = $relatorio['media_valor_troca'] = 0; //para evitar divisao por zero a seguir
        if($relatorio['count_trocas'] != 0) {
            //.Média ticket compra
            $relatorio['media_valor_troca'] = number_format($relatorio['valor_cupons_fiscais']/$relatorio['count_trocas'], 2);
            //.media de valor dos cupons fiscais
            $relatorio['media'] = number_format($relatorio['valor_cupons_fiscais']/$relatorio['num_cupons_fiscais'], 2);
        }

        ////////////////
        //dados relacionados a campanhas com bandeira promocional
        ////////////////
        //.Quantidade de consumidores que compraram com Bandeira da promoção (VISA/MASTER)
        $relatorio['num_consumidores_bandeira'] = $this->_num_consumidores_bandeira($inicio,$fim);
        //.Quantidade de consumidores que compraram sem VISA/MASTER
        $relatorio['num_consumidores_not_bandeira'] = $this->_num_consumidores_not_bandeira($inicio,$fim);
        //.Quantidade de consumidores novos que compraram com VISA/MASTER
        $relatorio['num_consumidores_novos_bandeira'] = $this->_num_consumidores_novos_bandeira($inicio,$fim);
        //.Quantidade de consumidores novos que compraram sem VISA/MASTER
        $relatorio['num_consumidores_novos_not_bandeira'] = $this->_num_consumidores_novos_not_bandeira($inicio,$fim);

        return $relatorio;
    }






    function _num_consumidores_bandeira($inicio, $fim = null ) {
        if(is_null($fim)) $fim = date('Y-m-d', strtotime("+1 days"));
        $conditionsSubQuery = array(
                'CF.bandeira' => Configure::read('Regras.Bandeira.nome'),
                //'CF.forma_de_pagamento' => 'Credito',,//se interessar somente credito ou debito
                'CF.created BETWEEN ? AND ? ' => array($inicio,$fim));
        $dbo = $this->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),//retirar essas condições null?
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this
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
        $dbo = $this->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this
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
        $dbo = $this->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this
        );
        $conditionsSubQuery2 = array(
                'Consumidor.created BETWEEN ? AND ? ' => array($inicio,$fim));
        $dbo2 = $this->Consumidor->getDataSource();
        $subQuery2 = $dbo2->buildStatement(
                array(
                'fields' => array('Consumidor.id'),
                'table' => $dbo2->fullTableName($this->Consumidor),
                'alias' => 'Consumidor',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery2,
                'order' => null,
                'group' => null
                ),
                $this->Consumidor
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
        $dbo = $this->getDataSource();
        $subQuery = $dbo->buildStatement(
                array(
                'fields' => array('CF.troca_id'),
                'table' => $dbo->fullTableName($this),
                'alias' => 'CF',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery,
                'order' => null,
                'group' => null
                ),
                $this
        );
        $conditionsSubQuery2 = array(
                'Consumidor.created BETWEEN ? AND ? ' => array($inicio,$fim));
        $dbo2 = $this->Consumidor->getDataSource();
        $subQuery2 = $dbo2->buildStatement(
                array(
                'fields' => array('Consumidor.id'),
                'table' => $dbo2->fullTableName($this->Consumidor),
                'alias' => 'Consumidor',
                'limit' => null,
                'offset' => null,
                'joins' => array(),
                'conditions' => $conditionsSubQuery2,
                'order' => null,
                'group' => null
                ),
                $this->Consumidor
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

    /**
     * @link http://abcoder.com/php/cakephp/cakephp-advanced-pagination-sort-by-derived-field/
     * @link http://book.cakephp.org/view/164/Pagination
     *
     * @package       cake
     * @subpackage    cake.cake.libs.controller
     * @see function paginate
     *
     * Handles automatic pagination of model records.
     *
     * @param mixed $object Model to paginate (e.g: model instance, or 'Model', or 'Model.InnerModel')
     * @param mixed $scope Conditions to use while paginating
     * @param array $whitelist List of allowed options for paging
     * @return array Model query results
     * @access public
     * @link http://book.cakephp.org/view/165/Controller-Setup
     */
    function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
        if(empty($order)) {
            // great fix!
            if(isset ($extra['passit'])) {
                $order = array($extra['passit']['sort'] => $extra['passit']['direction']);
            }else {
                $order = array();
            }
        }
        if(isset ($extra['group'])) {
            $group = $extra['group'];
        }else {
            $group = '';
        }

        return $this->find('all', compact('conditions', 'fields', 'order', 'limit', 'page', 'recursive', 'group'));
    }

    /**
     * Unsets contain key for faster pagination counts
     *
     * @link http://teknoid.wordpress.com/2010/01/30/lets-help-out-cakephps-pagination/
     *
     * @param array $conditions
     * @param integer $recursive
     * @param array $extra
     * @return integer
     * @author Jose Diaz-Gonzalez
     */
    public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
        $conditions = compact('conditions');
        if ($recursive != $this->recursive) {
            $conditions['recursive'] = $recursive;
        }
        $extra['contain'] = false;
        //return $this->find('count', array_merge($conditions, $extra));//não retorna a soma
        return count($this->find('all', array_merge($conditions, $extra)));
    }

    function _buscaRelatorioLoja($id) {

        $conditions_valor_cupons_fiscais = array(
                'fields' => array("SUM(CupomFiscal.valor) AS 'total'","COUNT(DISTINCT (CupomFiscal.consumidor_id) ) AS 'total_consumidores'"),
                'conditions' => array('loja_id'=>$id)
        );
        $relatorio_total = $this->find('first', $conditions_valor_cupons_fiscais);//debug($relatorio_total);

        $relatorio_bandeira['CupomFiscal'] = $relatorio_outros['CupomFiscal'] = array();
        if(Configure::read('Regras.Bandeira.true')) {

            $conditions_valor_cupons_fiscais = array(
                    'fields' => array("SUM(CupomFiscal.valor) AS 'total_bandeira'","COUNT(DISTINCT (CupomFiscal.consumidor_id) ) AS 'total_consumidores_bandeira'"),
                    'conditions' => array('loja_id'=>$id, 'bandeira'=>Configure::read('Regras.Bandeira.nome'))
            );
            $relatorio_bandeira = $this->find('first', $conditions_valor_cupons_fiscais);
            //debug("ba = ".$relatorio_bandeira);

            $conditions_valor_cupons_fiscais = array(
                    'fields' => array("SUM(CupomFiscal.valor) AS 'total_outros'","COUNT(DISTINCT (CupomFiscal.consumidor_id) ) AS 'total_consumidores_outros'"),
                    'conditions' => array('loja_id'=>$id,
                            'OR' =>array(
                                    'NOT'=>array('bandeira'=>Configure::read('Regras.Bandeira.nome') ),
                                    'AND'=>array('bandeira'=>null) ) )
            );
            $relatorio_outros = $this->find('first', $conditions_valor_cupons_fiscais);//debug($relatorio_outros);
        }

        $relatorio = array_merge($relatorio_total['CupomFiscal'], $relatorio_bandeira['CupomFiscal'], $relatorio_outros['CupomFiscal']);
        //debug($relatorio);
        return $relatorio;
    }

    function _buscaRelatorioConsumidor($id) {
        $relatorio = array();

        $conditions_valor_cupons_fiscais = array(
                'fields' => array("SUM(CupomFiscal.valor) AS 'total'", "COUNT(DISTINCT (CupomFiscal.loja_id) ) AS 'total_lojas'",
                        "COUNT(DISTINCT (CupomFiscal.id) ) AS 'total_cf'", "COUNT(DISTINCT (CupomFiscal.troca_id) ) AS 'total_trocas'",
                        "AVG(CupomFiscal.valor) AS 'media_cf'",
                ),
                'conditions' => array('CupomFiscal.consumidor_id'=>$id)
        );
        $relatorio_total = $this->find('first', $conditions_valor_cupons_fiscais);//debug($relatorio_total);

        //bandeira, outros
        $relatorio_bandeira['CupomFiscal'] = $relatorio_outros['CupomFiscal'] = array();
        if(Configure::read('Regras.Bandeira.true')) {
            $conditions_valor_cupons_fiscais = array(
                    'fields' => array("SUM(CupomFiscal.valor) AS 'total_bandeira'"),
                    'conditions' => array('CupomFiscal.consumidor_id'=>$id, 'bandeira'=>Configure::read('Regras.Bandeira.nome'))
            );
            $relatorio_bandeira = $this->find('first', $conditions_valor_cupons_fiscais);//debug($relatorio_bandeira);

            $conditions_valor_cupons_fiscais = array(
                    'fields' => array("SUM(CupomFiscal.valor) AS 'total_outros'"),
                    'conditions' => array('CupomFiscal.consumidor_id'=>$id,
                            'OR' =>array(
                                    'NOT'=>array('bandeira'=>Configure::read('Regras.Bandeira.nome') ),
                                    'AND'=>array('bandeira'=>null) ) )
            );
            $relatorio_outros = $this->find('first', $conditions_valor_cupons_fiscais);//debug($relatorio_outros);
        }

        //brindes, cp
        $conditions_qtd_premios = array(
                'fields' => array("SUM(Troca.qtd_premios) AS 'total_brindes'", "SUM(Troca.qtd_cp) AS 'total_cp'"),
                'conditions' => array('Troca.consumidor_id'=>$id)
        );
        $this->Troca->recursive = -1;
        $relatorio_qtd_premios = $this->Troca->find('first', $conditions_qtd_premios);//debug($relatorio_qtd_premios);


        $conditions_troca = array(
                'fields' => array("AVG(Troca.valor_total) AS 'troca_media'", "AVG(Troca.qtd_cf) AS 'troca_media_qtd_cf'"),
                'conditions' => array('Troca.consumidor_id'=>$id)
        );
        $this->Troca->recursive = -1;
        $relatorio_troca = $this->Troca->find('first', $conditions_troca);//debug($relatorio_troca);


        $relatorio = array_merge($relatorio, $relatorio_qtd_premios[0], $relatorio_troca[0],
                $relatorio_total['CupomFiscal'], $relatorio_bandeira['CupomFiscal'], $relatorio_outros['CupomFiscal']);
        //debug($relatorio);
        return $relatorio;
    }




    /**
     * @link http://book.cakephp.org/view/681/afterFind
     * @link http://teknoid.wordpress.com/2008/09/29/dealing-with-calculated-fields-in-cakephps-find/
     */
    function afterFind($results, $primary=false) {
        if($primary == true) {
            //if(Set::check($results, '0.0')) {
            //    $fieldName = key($results[0][0]);
            //    foreach($results as $key=>$value) {
            //        $results[$key][$this->alias][$fieldName] = $value[0][$fieldName];
            //        unset($results[$key][0]);
            //    }
            //}
            //http://teknoid.wordpress.com/2008/09/29/dealing-with-calculated-fields-in-cakephps-find/#comment-2272
            //if (Set::check($results, '0.0')) {
            //    foreach($results as &$entry) {
            //        $entry[$this->alias] = array_merge($entry[$this->alias], $entry[0]);
            //        unset($entry[0]);
            //    }
            //}
            if (Set::check($results, '0.0')) {
                foreach($results as &$entry) {
                    $entry[$this->alias] = isset($entry[$this->alias]) ? array_merge($entry[$this->alias], $entry[0]) : $entry[0];
                    unset($entry[0]);
                }
            }
        }

        return $results;
    }


    /**
     * soma os valores dos cupons fiscais enviados
     *
     * @return array array('valorBandeira'=>$valorBandeira,'valorOutros'=>$valorOutros);
     */
    function _somaValorCFs($cfs) {
        $valorBandeira = $valorOutros = 0;
        foreach ($cfs as $cf) {//debug($cf);
            if(isset ($cf['bandeira'])) {//debug($cf['bandeira'] . " " . $regras['Bandeira']['nome']);
                if( up($cf['bandeira']) == up(Configure::read('Regras.Bandeira.nome') ) ) {
                    $valorBandeira += str_replace(',','.',$cf['valor']);//debug('bandeira = ' . $valorBandeira);
                }else {//bandeiras fora da promocao
                    $valorOutros += str_replace(',','.',$cf['valor']);//debug("dinheiro = " . $valorOutros);
                }
            }else {
                $valorOutros += str_replace(',','.',$cf['valor']);//debug("dinheiro = " . $valorOutros);
            }
        }
        return array('valorBandeira'=>$valorBandeira,'valorOutros'=>$valorOutros);
    }



    /**
     * Totais na tabela /lojas/resumo_diario
     *
     * @return array
     */
    function _lojasTotais() {
        return $this->find('first', array(
                'fields' => array(
                        'COUNT(CupomFiscal.codigo) AS sum_cf',
                        'SUM(CupomFiscal.valor) AS sum_valor',
                        'AVG(CupomFiscal.valor) AS avg_valor'
        )));
    }
}
?>