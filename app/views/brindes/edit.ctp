<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Brinde</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/brindes', array('class'=>'btn_cinza floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="brindes form">
<?php echo $form->create('Brinde');?>
	<fieldset>
        <legend>Dados Gerais</legend>
	<?php
		echo $form->input('id');
		echo $form->input('name', array('div' => 'input text mgt20', 'label' => 'Nome'));
        ?>
        <!-- Será usado qd tiver controle de premiacao para cada tipo de brinde
<div class="duas_colunas">
        <?php
			echo $form->input('valor', array('label' => 'Valor', 'div' =>'input text meio_input'));
			echo $form->input('consumidor_max', array('label' => 'M&aacute;ximo de Consumidores', 'div' =>'input text meio_input'));
        ?>
</div>
        -->
        <!-- Será usado qd tiver controle de premiacao para cada tipo de brinde
<div class="duas_colunas">
        <?php
			echo $form->input('estoque_inicial', array('label' => 'Estoque Inicial', 'div' =>'input text meio_input'));
			echo $form->input('estoque_atual', array('label' => 'Estoque Final', 'div' =>'input text meio_input'));
        ?>
</div>
        -->
        <?php
        echo $form->input('obs', array('label' => 'Observa&ccedil;&otilde;es','type'=>'textarea'));
	?>
	</fieldset>
    <?php echo $form->end(array('label'=>'SALVAR','class'=>'submit'));?>
</div>