<?php
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

}
?>
