<?php
/**
 * @property Entrada $Entrada
 * @property Brinde $Brinde
 */
class Entrada extends AppModel {

	var $name = 'Entrada';
	var $validate = array(
		'brinde_id' => array('numeric'),
		'qtd' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Brinde' => array(
			'className' => 'Brinde',
			'foreignKey' => 'brinde_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /**
     * Totais para mostrar no fim da tabela
     *
     * @since namorados 2010
     * @return array
     */
    function _totais_entradas(){
        $totais = $this->find('first',array(
                'fields' => array(
                        "COUNT(Entrada.id) AS 'qtd_entradas_total'",
                        "SUM(Entrada.qtd) AS 'quantidade_total'"
                ),
            'recursive' => -1
        ));debug($totais);
        return $totais[0];
    }

}
?>