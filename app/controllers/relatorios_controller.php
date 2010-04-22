<?php
/**
 * @property Troca $Troca
 * @property CupomPromocional $CupomPromocional
 * @property ResumoDiario $ResumoDiario
 * @property DiaTroca $DiaTroca
 * @property Consumidor $Consumidor
 * @property TrocasDia $TrocasDia
 */
class RelatoriosController extends AppController {

    var $name = 'Relatorios';
    var $helpers = array('Html', 'Form', 'Javascript', 'CakePtbr.Formatacao');

    var $uses = array('Troca','CupomPromocional','CupomFiscal','ResumoDiario','DiaTroca','Consumidor','TrocasDia');


    function beforeFilter() {
        parent::beforeFilter();
    }

    function index() {
        $this->Troca->recursive = 0;
        $this->set('trocas', $this->paginate());
    }

    function detalhe_dia($dia=null) {//debug($dia);

        if(!$dia){
            $this->Session->setFlash(__('Dia Inválido', true));            
            $this->redirect(array('controller' => 'resumo_diarios'));
        }


        if(!$this->DiaTroca->_diaexiste($dia)){
            $this->Session->setFlash(__('Dia Inválido', true));
            $this->redirect(array('controller' => 'resumo_diarios'));
        }

        $this->paginate = array(
                'TrocasDia' => array('fields' => array( 'consumidor_id','consumidor_nome', 'SUM(qtd_cf) AS "sum_cf"', 'SUM(qtd_cp) AS sum_cp', 'AVG(valor_total) AS avg_valor_total',
                                'SUM(valor_total) AS sum_valor_total','SUM(valor_bandeira) AS sum_bandeira' , 'SUM(valor_outros) AS sum_outros'),
                        'group' => array('consumidor_id'),
                        'recursive' => -1 ));
        
        $this->TrocasDia->useTable = true;
        $this->TrocasDia->table = $this->Consumidor->tablePrefix . "trocas_".$dia; //troca para a tabela diaria
        $this->set('detalhes', $this->paginate('TrocasDia'));

        $this->set('dia', $dia);

    }

}
?>