<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Cupom Promocional</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/cupom_promocionais', array('class'=>'btn_cinza floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>

<div class="cupomPromocionais form">
<?php echo $form->create('CupomPromocional');?>
	<fieldset>
 		<legend>Dados Gerais</legend>
		<?php
			echo $form->input('id');
			echo $form->input('troca_id');
			echo $form->input('promotor_id');
			echo $form->input('consumidor_id');
			echo $form->input('data_impressao');
		?>
	</fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>