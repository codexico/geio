<?php
class Brinde extends AppModel {

    var $name = 'Brinde';
    var $validate = array(
            'name' => array('notempty'),
            'estoque_inicial' => array('numeric'),
            'estoque_atual' => array('numeric')
    );
}
?>