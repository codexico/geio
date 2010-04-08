<?php
/**
 * @property Troca $Troca
 * @property CupomPromocional $CupomPromocional
 * @property ResumoDiario $ResumoDiario
 * @property DiaTroca $DiaTroca
 * @property Consumidor $Consumidor
 * @property TrocasDia $TrocasDia
 */
class ResumoDiariosController extends AppController {

    var $name = 'ResumoDiarios';

    var $helpers = array('Html', 'Form', 'Javascript', 'CakePtbr.Formatacao');

    //var $uses = array('Troca','CupomPromocional','CupomFiscal','DiaTroca','Consumidor','TrocasDia','ResumoDiario');

    function beforeFilter() {
        parent::beforeFilter();
    }

    function index() {
        
        $this->ResumoDiario->atualizar();

        $this->ResumoDiario->recursive = 0;
        $this->set('resumoDiarios', $this->paginate());
    }

}
?>