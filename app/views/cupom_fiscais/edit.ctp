<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Cupom Fiscal</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/cupom_fiscais', array('class'=>'btn_cinza floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="cupomFiscais form">
<?php echo $form->create('CupomFiscal');?>
	<fieldset>
 		<legend>Dados Gerais</legend>
	<?php
		echo $form->input('id');
		echo $form->input('codigo', array('div' => 'input text mgt20', 'label' => 'C&oacute;digo'));
		echo $form->input('troca_id');
		echo $form->input('loja_id');
		echo $form->input('valor');

        echo '<div class="duas_colunas">';
			echo $form->input('forma_de_pagamento', array('label' => 'Forma de Pagamento', 'div' =>'input text meio_input'));
			echo $form->input('bandeira', array('div' =>'input text meio_input'));
        echo '</div>';
	?>
	</fieldset>
    <?php echo $form->end(array('label'=>'SALVAR','class'=>'submit'));?>
</div>