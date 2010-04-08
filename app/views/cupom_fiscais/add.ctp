<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Inserir Cupom Fiscal</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/cupom_fiscais', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link('Trocas', array('controller' => 'trocas', 'action' => 'index'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Inserir Troca', array('controller' => 'trocas', 'action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Lojas', array('controller' => 'lojas', 'action' => 'index'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Inserir Loja', array('controller' => 'lojas', 'action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="cupomFiscais form">
<?php echo $form->create('CupomFiscal');?>
     <fieldset>
        <legend>Dados Gerais</legend>
        <?php
        echo $form->input('codigo', array('div' => 'input text mgt20', 'label' => 'C&oacute;digo'));
        //echo $form->input('data_compra');
        echo $form->input('data_compra', array(
        'dateFormat'=>'DMY',
        'timeFormat'=>'24',
        'minYear'=> date('Y'),
        'maxYear' => date('Y'),
        'selected'=> strtotime("now -3 hours")//quanto tempo a pessoa demora para ir trocar o cupom fiscal, 3 horas?
        )
        );
        echo $form->input('troca_id');
        echo $form->input('loja_id');
        echo $form->input('valor');
        //echo $form->input('forma_de_pagamento');
        echo $form->input('forma_de_pagamento', array('label' => 'Forma de Pagamento', 'options' => array(
                'Dinheiro'=>'Dinheiro',
                'Débito'=>'Débito',
                'Crédito'=>'Crédito'
        )));
        //echo $form->input('bandeira');
        echo $form->input('bandeira', array('options' => array(
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
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>