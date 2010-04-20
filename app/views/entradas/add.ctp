<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Inserir Entrada</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
    <?php echo $html->link('Voltar', '/entradas', array('class'=>'btn_cinza floatRight')); ?>
</div>

<?php $session->flash(); ?>

<div class="entradas form">
<?php echo $form->create('Entrada');?>
	<fieldset>
        <legend>DADOS GERAIS</legend>
	<?php
		echo $form->input('brinde_id', array('div' => 'input text mgt20'));
		echo $form->input('qtd', array('div' => 'input text mgt20', 'label' => 'Quantidade'));
	?>
	</fieldset>
    <?php echo $form->end(array('label'=>'SALVAR','class'=>'submit'));?>
</div>
