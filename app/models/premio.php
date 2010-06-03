<?php
class Premio extends AppModel {

    var $name = 'Premio';
    var $validate = array(
            //'troca_id' => array('numeric'),
            'consumidor_id' => array('numeric'),
            'promotor_id' => array('numeric'),
            //'model' => array('notempty'),
            //'foreign_key' => array('numeric')
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
            'Troca' => array(
                            'className' => 'Troca',
                            'foreignKey' => 'troca_id',
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
            ),
            'Promotor' => array(
                            'className' => 'Promotor',
                            'foreignKey' => 'promotor_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
            ),
            'Brinde' => array(
                            'className' => 'Brinde',
                            'foreignKey' => 'foreign_key',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
            )
    );


    /**
     * Retorna a quantidade de cada premio e seu nome e valor acumulado.
     * Se passado um fim, o primeiro parâmetro é considerado o inicio.
     *
     * @since namorados 2010
     * @param string $dia   data no formato Y-m-d
     * @param string $fim   opcional: data no formato Y-m-d
     * @return array
     */
    function _premiosPeriodo($dia, $fim = null ) {

        $conditions_data_premio = array("DATE_FORMAT(Premio.created , '%Y-%m-%d' ) = " => $dia);
        if($fim){
            $conditions_data_premio = array("DATE_FORMAT(Premio.created , '%Y-%m-%d' ) BETWEEN ? AND ? " => array($dia,$fim));
        }

        $this->Behaviors->attach('Containable');
        $premios = $this->find('all', array(
                'conditions'=> $conditions_data_premio,
                'fields' => array(
                        "COUNT(Premio.id) AS 'qtd_premios_total'",
                        'Premio.foreign_key',
                        'Brinde.name',
                        "SUM(Brinde.valor) AS 'premios_valor'"
                ),
                'group' => array('Premio.foreign_key'),
                'contain'=>'Brinde'
        ));//debug($totais);
        return $premios;
    }

    function _premiosPeriodoTotais($dia, $fim = null ) {

        $conditions_data_premio = array("DATE_FORMAT(Premio.created , '%Y-%m-%d' ) = " => $dia);
        if($fim){
            $conditions_data_premio = array("DATE_FORMAT(Premio.created , '%Y-%m-%d' ) BETWEEN ? AND ? " => array($dia,$fim));
        }

        $this->Behaviors->attach('Containable');
        $somas = $this->find('first', array(
                'conditions'=> $conditions_data_premio,
                'fields' => array(
                        "COUNT(Premio.id) AS 'qtd_premios_total'",
                        "SUM(Brinde.valor) AS 'premios_valor_total'"
                ),
                //'group' => array('Premio.foreign_key'),
                'contain'=>'Brinde'
        ));//debug($totais);
        return $somas;
    }
}
?>