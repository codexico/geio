<?php
/**
 * @property Troca $Troca
 * @property CupomPromocional $CupomPromocional
 * @property CupomFiscal $CupomFiscal
 * @property Consumidor $Consumidor
 * @property Promotor $Promotor
 * @property Premio $Premio
 */
class Troca extends AppModel {

	var $name = 'Troca';
        
 var $actsAs = array('Containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Promotor' => array(
			'className' => 'Promotor',
			'foreignKey' => 'promotor_id',
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

	var $hasMany = array(
		'CupomFiscal' => array(
			'className' => 'CupomFiscal',
			'foreignKey' => 'troca_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'CupomPromocional' => array(
			'className' => 'CupomPromocional',
			'foreignKey' => 'troca_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Premio' => array(
			'className' => 'Premio',
			'foreignKey' => 'troca_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


    function _buscaRelatorioPromotor($id) {
        $relatorio = array();

        $conditions_trocas = array(
                'fields' => array("SUM(Troca.valor_total) AS 'total'", 
                    "COUNT(DISTINCT (Troca.id) ) AS 'total_trocas'", "COUNT(DISTINCT (Troca.consumidor_id) ) AS 'total_consumidores'",
                        "SUM(Troca.qtd_cf) AS 'total_cf'", "SUM(Troca.qtd_cp) AS 'total_cp'", "SUM(Troca.qtd_premios) AS 'total_brindes'",
                        "SUM(Troca.valor_bandeira) AS 'total_bandeira'", "SUM(Troca.valor_outros) AS 'total_outros'",
                        "AVG(Troca.valor_total) AS 'media_total'", "AVG(Troca.valor_bandeira) AS 'media_bandeira'", "AVG(Troca.valor_outros) AS 'media_outros'",
                    "AVG(Troca.qtd_cf) AS 'media_cf'", "AVG(Troca.qtd_cp) AS 'media_cp'", "AVG(Troca.qtd_premios) AS 'media_brindes'",
                ),
                'conditions' => array('Troca.promotor_id'=>$id)
        );
        $relatorio_trocas = $this->find('first', $conditions_trocas);//debug($relatorio_trocas);

//        $conditions_trocas_consumidor = array(
//                'fields' => array(
//                        "AVG(Troca.valor_total) AS 'media_total'",
//                    "AVG(Troca.valor_bandeira) AS 'media_bandeira'", "AVG(Troca.valor_outros) AS 'media_outros'",
//                    "AVG(Troca.qtd_cf) AS 'media_cf'", "AVG(Troca.qtd_cp) AS 'media_cp'",
//                ),
//                'conditions' => array('Troca.promotor_id'=>$id),
//            'group'=>'consumidor_id'
//        );
//        $relatorio_trocas_consumidor = $this->find('all', $conditions_trocas_consumidor);//debug($relatorio_trocas_consumidor);

//        $relatorio = array_merge($relatorio, $relatorio_qtd_premios[0], $relatorio_troca[0],
//                $relatorio_total['CupomFiscal'], $relatorio_bandeira['CupomFiscal'], $relatorio_outros['CupomFiscal']);
        //debug($relatorio);
        //return $relatorio;

        return $relatorio_trocas[0];
    }

    function atualizarQtdPremiosTrocados($qtd_premios_trocados){
//        $this->recursive = -1;
//        $this->id = $data['brinde_id'];
//        $brinde = $this->read();
        return $this->saveField('qtd_premios_trocados', $qtd_premios_trocados);
    }

}
?>