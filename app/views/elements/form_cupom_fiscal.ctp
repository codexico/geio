<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
$javascript->link(array('jquery-1.4.2.min'), false);// false para ir em <head>
$javascript->link(array('trocas_nova'), false);
?>

<li class="cupom" id="cupom-fiscal-<?=$i;?>">
    <fieldset><legend>Cupom Fiscal <?=$i+1;?>&nbsp;&nbsp;
            <input id="remover-cupom-fiscal-<?=$i;?>" class="remover-cupom-fiscal" type="button" value="Remover este Cupom" /></legend>
        <?php
        echo $form->input('CupomFiscal.'.$i.'.codigo', array('label'=>'Número do Cupom Fiscal'));

        $data_compra['hour'] =$data_compra['minute'] ='';
        if(!isset ($this->data['CupomFiscal'][$i]['data_compra'])) {
            $data_compra = date_parse(date('Y-m-d H:i:s',strtotime("now -3 hours")));//quanto tempo a pessoa demora para ir trocar o cupom fiscal, 3 horas?
        }
        /*
        echo $form->input('CupomFiscal.'.$i.'.data_compra', array(
        'dateFormat'=>'DMY',
        'timeFormat'=>'24',
        'minYear'=> date('Y'),
        'maxYear' => date('Y'),
        'selected'=> $data_compra
        )
        );
        */
        ?>

        <div class="input select">
            <label for="CupomFiscal<?=$i?>DataCompraDay">Data do Cupom Fiscal</label>
            <?php echo $form->day('CupomFiscal.'.$i.'.data_compra', '', array('class'=>'select_dia'), true); ?>
            <?php echo $form->month('CupomFiscal.'.$i.'.data_compra', '', array('class'=>'select_mes'), true); ?>
            <?php echo $form->year('CupomFiscal.'.$i.'.data_compra', 1900, 2010, true, array('class'=>'select_ano')); ?>
        </div>
        <div class="input select">
            <? echo date('H',strtotime("now -5 hours")); ?>
            <?php echo $form->hour('CupomFiscal.'.$i.'.data_compra', true, $data_compra['hour'], array('class'=>'select_hora')); ?>
            <?php echo $form->minute('CupomFiscal.'.$i.'.data_compra', $data_compra['minute'], array('class'=>'select_minuto')); ?>
        </div>


        <?php
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