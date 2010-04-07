<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Troca</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/trocas', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Troca.id')), array('class'=>'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Troca.id'))); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="trocas form">
<?php echo $form->create('Troca');?>
	<fieldset>
 		<legend>Dados Gerais</legend>
	<?php
		echo $form->input('id');
		echo $form->input('promotor_id');
		echo $form->input('consumidor_id');
	?>
	</fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>