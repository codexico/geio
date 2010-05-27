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

    /**
     * Quantidade de premios que o Consumidor pode receber, considerando a
     * quantidade da Troca e o maximo de brindes que um Consumidor pode receber na Campanha
     *
     * @since namorados 2010
     * @param int $qtd_premios      quantidade de premios que o Consumidor pode receber na Troca
     * @param int $brinde_count     quantidade de premios que o Consumidor já recebeu
     * @return int                  quantidade de premios que o Consumidor pode receber
     */
    function _brindes_disponiveis($qtd_premios, $brinde_count){
        $brinde_max = Configure::read('Regras.Brinde.max'); //max de brindes que um Consumidor pode receber na Campanha

        if( $brinde_max < ( $qtd_premios + $brinde_count ) ) {
            return $brinde_max - $brinde_count;
        }
        return $qtd_premios;
    }
}
?>