<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Promotor</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/promotores', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link('Excluir Promotor', array('action' => 'delete', $form->value('Promotor.id')), array('class'=>'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Promotor.id'))); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="promotores form">
<?php echo $form->create('Promotor');?>
	<fieldset>
 		<legend>Dados Gerais</legend>
	<?php
		echo $form->input('id');
		echo $form->input('nome', array('div' => 'input text mgt20', 'label' => 'Nome de Usu&aacute;rios'));
		echo $form->input('email', array('label' => 'E-mail'));
		echo $form->input('rg', array('label' => 'RG'));
		//echo $form->hidden('user_id');
		//echo $form->hidden('User.id');
		//echo $form->input('User.username', array('label' => 'Login'));
        echo $form->input('cpf', array('label' => 'CPF (somente n&uacute;meros)'));

        echo $form->input('tel', array('label' => 'Telefone (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));
        echo $form->input('cel', array('label' => 'Celular (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));

        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observa&ccedil;&otilde;es'));
	?>
	</fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>