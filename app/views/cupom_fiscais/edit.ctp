<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Cupom Fiscal</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/cupom_fiscais', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link('Excluir Cupom', array('action' => 'delete', $form->value('CupomFiscal.id')), array('class'=>'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('CupomFiscal.id'))); ?>
	<?php echo $html->link('Trocas', array('controller' => 'trocas', 'action' => 'index'), array('class'=>'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Inserir Troca', array('controller' => 'trocas', 'action' => 'add'), array('class'=>'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Lojas', array('controller' => 'lojas', 'action' => 'index'), array('class'=>'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Inserir Loja', array('controller' => 'lojas', 'action' => 'add'), array('class'=>'btn_azul floatRight mgr5')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="cupomFiscais form">
<?php echo $form->create('CupomFiscal');?>
	<fieldset>
 		<legend>Dados Gerais</legend>
	<?php
		echo $form->input('id');
		echo $form->input('codigo');
		echo $form->input('troca_id');
		echo $form->input('loja_id');
		echo $form->input('valor');
		echo $form->input('forma_de_pagamento');
		echo $form->input('bandeira');
	?>
	</fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>