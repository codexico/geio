<?php
$javascript->link(array('jquery-1.4.2.min'), false);// false para ir em <head>
$javascript->link(array('novatroca'), false);

//debug($lojas);
//debug($lojas_razao_social);
//debug($this['Troca']['lojasRazaoSocial']);
//debug($lojasRazaoSocial);
?>



<div class="trocas form">
    <?php echo $form->create('Troca', array('action'=> 'nova', 'onsubmit'=>'return confirm("Confirma?")'));?>
    <fieldset>
        <legend><?php __('Add Troca');?></legend>
        <?php
        echo $form->input('promotor_id');
        echo $form->input('consumidor_id');
        ?>
        <ul id="cupons">
            <li class="cupom">
                <fieldset><legend>Cupom Fiscal</legend>
                    <?php
                    echo $form->input('CupomFiscal.0.codigo');

                    echo $form->input('CupomFiscal.0.data_compra', array(
                    'dateFormat'=>'DMY',
                    'timeFormat'=>'24',
                    'minYear'=> date('Y'),
                    'maxYear' => date('Y'),
                    'selected'=> strtotime("now -3 hours")//quanto tempo a pessoa demora para ir trocar o cupom fiscal, 3 horas?
                    )
                    );
                    echo $form->input('CupomFiscal.0.loja_id', array('class'=> 'nomefantasia'));
                    echo $form->input('CupomFiscal.0.loja_razao_social',array('options'=> $lojasRazaoSocial, 'class'=>'razaosocial'));


                    echo $form->input('CupomFiscal.0.valor');

                    echo $form->input('CupomFiscal.0.forma_de_pagamento', array('options' => array(
                            'Dinheiro'=>'Dinheiro',
                            'Débito'=>'Débito',
                            'Crédito'=>'Crédito'
                    )));

                    echo $form->input('CupomFiscal.0.bandeira', array('options' => array(
                            'VISA'=>'VISA',
                            'MasterCard'=>'MasterCard',
                            'HiperCard'=>'HiperCard',
                            'Diners'=>'Diners',
                            'Aura'=>'Aura',
                            'American Express'=>'American Express',
                            'outro'=>'outro'
                    ),
                    'selected'=>'',
                    'empty' => true));

                    ?>
                </fieldset>
            </li>
        </ul>
        <input id="acrescentar-cupom" type="button" value="Acrescentar Cupom Fiscal" />
    </fieldset>
    <?php echo $form->end('Submit');?>
</div>
<div class="actions">
    <!--
    <ul>
        <li><?php 
    //echo $html->link(__('List Trocas', true), array('action' => 'index'));?>
    </li>
    </ul>

    <?php
    //echo $this->element('admin_links');
    ?>
    -->

</div>