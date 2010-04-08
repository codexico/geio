<?php
/**
 * @property TrocasDia $TrocasDia
 * @property Consumidor $Consumidor
 */
class TrocasDia extends AppModel {

    var $name = 'TrocasDia';

    var $useTable = false;


    var $belongsTo = array(
            'Consumidor' => array(
                            'className' => 'Consumidor',
                            'foreignKey' => 'consumidor_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
            )
    );


    function _find_detalhe_dia($dia) {

        $this->useTable = true;
        $this->table = $this->Consumidor->tablePrefix . "trocas_".$dia; //troca para a tabela diaria

        //SELECT consumidor_nome, SUM( qtd_cf ) , AVG( valor_total ) , SUM( valor_total ) , SUM( valor_bandeira ) , SUM( valor_outros ) , SUM( qtd_cp )
        //      FROM `shoppingteste_trocas_2010-03-31` GROUP BY consumidor_id
        return $this->find('all', array(
                'fields' => array( 'consumidor_id','consumidor_nome', 'SUM(qtd_cf) AS "sum_cf"', 'SUM(qtd_cp) AS sum_cp', 'AVG(valor_total) AS avg_valor_total',
                        'SUM(valor_total) AS sum_valor_total','SUM(valor_bandeira) AS sum_bandeira' , 'SUM(valor_outros) AS sum_outros'),
                'group' => array('consumidor_id'),
                'recursive' => -1 ) );
    }

    /**
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


}
?>
