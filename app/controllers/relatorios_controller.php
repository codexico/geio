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





}
?>