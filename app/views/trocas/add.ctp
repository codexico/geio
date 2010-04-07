<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Inserir Troca</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/trocas', array('class'=>'btn_cinza floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="trocas form">
<?php echo $form->create('Troca');?>
	<fieldset>
 		<legend>Dados Gerais</legend>
	<?php
		echo $form->input('promotor_id');
		echo $form->input('consumidor_id');
	?>
	</fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>