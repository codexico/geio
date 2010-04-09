<?php
class CupomFiscal extends AppModel {

    var $name = 'CupomFiscal';
    var $validate = array(
            'codigo' => array(
                            'rule' => 'isUnique',
                            'message' => 'Este cupom já foi cadastrado'
            ),

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