<?php
/**
 * @property Entrada $Entrada
 * @property Brinde $Brinde
 */
class Brinde extends AppModel {

    var $name = 'Brinde';

    var $actsAs = array('SoftDeletable' => array('find'=>false) );

    var $validate = array(
            'name' => array('notempty'),
            'valor' => array('numeric'),
            'consumidor_max' => array('numeric'),
            'estoque_inicial' => array('numeric'),
            'estoque_atual' => array('numeric'),
            'obs' => array(
                            'rule' => array('maxLength', '510'),
                            'message' => 'Máximo 500 caracteres',
                            'allowEmpty' => true,
                            'required' => false)
    );


    function _atualizarEstoque($data) {
        $this->recursive = -1;
        $this->id = $data['brinde_id'];
        $brinde = $this->read();
        return $this->saveField('estoque_atual', ($brinde['Brinde']['estoque_atual'] + $data['qtd']) );
    }


    function _atualizarAllEstoque($brindes) {

        foreach($brindes as $b) {
            $this->recursive = -1;
            $this->id = $b['brinde_id'];
            $brinde = $this->read();
            $this->saveField('estoque_atual', ($brinde['Brinde']['estoque_atual'] + $b['qtd']) );
        }
    }

    /**
     * Quantidade de premios que o Consumidor pode receber, considerando a
     * quantidade da Troca e o maximo de brindes que um Consumidor pode receber na Campanha
     *
     * @since namorados 2010
     * @param integer $qtd_premios      quantidade de premios que o Consumidor pode receber na Troca
     * @param integer $brinde_count     quantidade de premios que o Consumidor já recebeu
     * @return integer                  quantidade de premios que o Consumidor pode receber
     */
    function _brindes_disponiveis($qtd_premios, $brinde_count) {
        $brinde_max = Configure::read('Regras.Brinde.max'); //max de brindes que um Consumidor pode receber na Campanha

        if( $brinde_max < ( $qtd_premios + $brinde_count ) ) {
            return $brinde_max - $brinde_count;
        }
        return $qtd_premios;
    }

    /**
     * Totais para mostrar no fim da tabela
     *
     * @since namorados 2010
     * @return array
     */
    function _totais_brindes(){
        $totais = $this->find('first',array(
                'fields' => array(
                        "COUNT(Brinde.id) AS 'qtd_brindes_total'",
                        "SUM(Brinde.estoque_atual) AS 'estoque_atual_total'"
                ),
            'recursive' => -1
        ));//debug($relatorio);
        return $totais[0];
    }
}
?>