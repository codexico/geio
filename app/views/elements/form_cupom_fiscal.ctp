
<li class="cupom" id="cupom-fiscal-<?=$i;?>">
    <fieldset><legend>Cupom Fiscal <?=$i+1;?>&nbsp;&nbsp;
    <input id="remover-cupom-fiscal-<?=$i;?>" class="remover-cupom-fiscal" type="button" value="Remover este Cupom" /></legend>
        <?php
        echo $form->input('CupomFiscal.'.$i.'.codigo', array('label'=>'Número do Cupom Fiscal'));

        $data_compra ='';
        if(!isset ($this->data['CupomFiscal'][$i]['data_compra'])) {
            $data_compra = strtotime("now -3 hours");//quanto tempo a pessoa demora para ir trocar o cupom fiscal, 3 horas?
        }
        echo $form->input('CupomFiscal.'.$i.'.data_compra', array(
        'dateFormat'=>'DMY',
        'timeFormat'=>'24',
        'minYear'=> date('Y'),
        'maxYear' => date('Y'),
        'selected'=> $data_compra
        )
        );
        echo $form->input('CupomFiscal.'.$i.'.loja_id', array('class'=> 'nomefantasia','label'=>'Nome Fantasia'));
        echo $form->input('CupomFiscal.'.$i.'.loja_razao_social',array(
            'options'=> $lojasRazaoSocial,
            'class'=>'razaosocial',
            'label'=>'Razão Social'));

        echo $form->input('CupomFiscal.'.$i.'.valor');

        echo $form->input('CupomFiscal.'.$i.'.forma_de_pagamento', array('options' => array(
                'Dinheiro'=>'Dinheiro',
                'Debito'=>'Débito',
                'Credito'=>'Crédito'
        )));

        $bandeira ='';
        if(isset ($this->data['CupomFiscal'][$i]['bandeira'])) {
            $bandeira = $this->data['CupomFiscal'][$i]['bandeira'];
        }
        echo $form->input('CupomFiscal.'.$i.'.bandeira', array('options' => array(
                'VISA'=>'VISA',
                'MasterCard'=>'MasterCard',
                'HiperCard'=>'HiperCard',
                'Diners'=>'Diners',
                'Aura'=>'Aura',
                'American Express'=>'American Express',
                'outro'=>'outro'
        ),
        'selected'=>$bandeira,
        'empty' => true));
        ?>
    </fieldset>
</li>