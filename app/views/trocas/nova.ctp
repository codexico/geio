<?php
$javascript->link(array('jquery-1.4.2.min'), false);// false para ir em <head>
$javascript->link(array('novatroca'), false);

//debug($lojas);
//debug($lojas_razao_social);
//debug($this['Troca']['lojasRazaoSocial']);
//debug($lojasRazaoSocial);
?>
<?php /*
<div class="consumidores form">
    <?php echo $form->create('Consumidor', array('action' => 'addAjax'));?>
    <fieldset>
        <legend><?php __('Add Consumidor');?></legend>
        <?php

        echo $form->input('nome');

        echo $form->input('rg', array('label' => 'RG'));
        echo $form->input('cpf', array('label' => 'CPF (somente números)'));
        echo $form->input('cel', array('label' => 'Celular (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));

        echo $form->input('tel', array('label' => 'Telefone (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));
        echo $form->input('email');


        //echo $form->input('sexo');
        echo $form->input('sexo', array('options' => array(
                'masculino'=>'masculino',
                'feminino'=>'feminino',
                'gls'=>'gls',
                'outro'=>'outro'
        ),
        'selected'=>'',
        'empty' => true));

        echo $form->input('nascimento',array(
        'dateFormat'=>'DMY',
        'timeFormat'=>'NONE',
        'minYear'=> date('Y') - 100,
        'maxYear' => date('Y'),
        'selected'=>'',
        //'selected'=>strtotime('01-01-2000'),
        'empty' => true
        )
        );

        //echo $form->input('estado_civil');
        echo $form->input('estado_civil', array('options' => array(
                'solteiro'=>'solteiro',
                'casado'=>'casado',
                'viúvo'=>'viúvo',
                'separado'=>'separado'
        ),
        'selected'=>'',
        'empty' => true));

        //echo $form->input('grau_de_instrucao');
        echo $form->input('grau_de_instrucao', array('options' => array(
                'nenhum'=>'nenhum',
                '1º Grau'=>'1º Grau',
                '2º Grau'=>'2º Grau',
                'Técnico'=>'Técnico',
                'Universitário'=>'Univesitário',
                'Mestrado'=>'Mestrado',
                'Doutorado'=>'Doutorado',
                'Pós'=>'Pós',
                'MBA'=>'MBA'
        ),
        'selected'=>'',
        'empty' => true));

        echo $form->input('profissao');

        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observações'));
        ?>
    </fieldset>
    <?php echo $form->end('Submit');?>
</div>
*/ ?>


<div class="trocas form">

                <?php $session->flash('Impressora'); ?>
    <?php
    echo $this->element('consumidor');
    ?>
    <?php echo $form->create('Troca', array('action'=> 'nova/'.$consumidor['Consumidor']['id'], 'onsubmit'=>'return confirm("Confirma?")'));?>
    <fieldset>
        <legend><?php __('Add Troca');?></legend>
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
        <input id="calcular-pontos" type="button" value="Calcular Pontos" />
    <?php echo $form->end('Salvar e gerar Cupons Promocionais');?>
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
