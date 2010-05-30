<?php
/**
 * @property Troca $Troca
 * @property CupomPromocional $CupomPromocional
 * @property ResumoDiario $ResumoDiario
 * @property DiaTroca $DiaTroca
 * @property Consumidor $Consumidor
 * @property TrocasDia $TrocasDia
 * @property Premio $Premio
 */
class RelatoriosController extends AppController {

    var $name = 'Relatorios';
    var $helpers = array('Html', 'Form', 'Javascript', 'CakePtbr.Formatacao');

    //var $uses = array('Troca','CupomPromocional','CupomFiscal','ResumoDiario','DiaTroca','Consumidor','TrocasDia');
    //var $uses = array('DiaTroca','TrocasDia');
    var $uses = array();

    function beforeFilter() {
        parent::beforeFilter();
    }

    function detalhe_dia($dia=null) {//debug($dia);

        if(!$dia) {
            $this->Session->setFlash(__('Dia Inválido', true));
            $this->redirect(array('controller' => 'resumo_diarios'));
        }

        $this->DiaTroca = ClassRegistry::init('DiaTroca');
        if(!$this->DiaTroca->_diaexiste($dia)) {
            $this->Session->setFlash(__('Dia Inválido', true));
            $this->redirect(array('controller' => 'resumo_diarios'));
        }

        $this->paginate = array(
                'TrocasDia' => array('fields' => array( 'consumidor_id','consumidor_nome', 'SUM(qtd_cf) AS "sum_cf"', 'AVG(valor_total) AS avg_valor_total',
                                'SUM(valor_total) AS sum_valor_total','SUM(valor_bandeira) AS sum_bandeira' , 'SUM(valor_outros) AS sum_outros',
                                'SUM(qtd_cp) AS sum_cp',
                                'SUM(qtd_premios) AS sum_premios', 'SUM(qtd_premios_trocados) AS sum_premios_trocados', 'SUM(valor_premios) AS sum_valor_premios'),
                        'group' => array('consumidor_id'),
                        'recursive' => -1 ));

        $this->TrocasDia = ClassRegistry::init('TrocasDia');
        $this->TrocasDia->useTable = true;
        $this->TrocasDia->table = $this->DiaTroca->tablePrefix . "trocas_".$dia; //troca para a tabela diaria

        $this->set('detalhes', $this->paginate('TrocasDia'));

        $this->set('dia', $dia);


        if( Configure::read('Regras.Brinde.true') ) {
            $this->Premio = ClassRegistry::init('Premio');
            $premios_dia = $this->Premio->_premiosPeriodo($dia);//debug($premios_dia);
            $this->set('premios_dia', $premios_dia);
        }

    }

}
?>