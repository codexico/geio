<?php
/**
 * @property DiaTroca $DiaTroca
 */
class DiaTroca extends AppModel {

    var $name = 'DiaTroca';

    //var $useTable = false;

    function getMaxDia(){
        $maxDia = $this->field('dia', array(), 'dia DESC');//debug($maxDia);
        if(!$maxDia) {
            $maxDia =  date('Y-m-d', strtotime(Configure::read('Campanha.Inicio') . " -1 days"));//inicio da campanha
        }//debug($maxDia);
        return $maxDia;
    }

    function _diaexiste($dia){
        return $this->find('first',array('conditions'=>array('dia'=>$dia)));
    }
}
?>
