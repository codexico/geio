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
            $maxDia =  date('Y-m-d', strtotime(Configure::read('Campanha.Inicio') . " -21 days"));//inicio da campanha
        }//debug($maxDia);
        return $maxDia;
    }
}
?>
