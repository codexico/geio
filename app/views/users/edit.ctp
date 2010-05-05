<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Usu&aacute;rio</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/users', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link('Excluir Usuario', array('action' => 'delete', $form->value('User.id')), array('class'=>'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('User.id'))); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="users form">
<?php echo $form->create('User');?>
	<fieldset>
 		<legend>Dados Gerais</legend>
	<?php
		echo $form->input('id');
		echo $form->input('username', array('div' => 'input text mgt20', 'label' => 'Login'));


        //That effectively eliminates the annoying Auth habit of hashing your password.

        echo '<div class="duas_colunas">';
	        echo $form->input('User.passwd', array('label' => 'Senha', 'div' =>'input text meio_input'));
			echo $form->input('User.passwd_confirm', array('type' => 'password', 'label' => 'Repita a senha', 'div' =>'input text meio_input'));
        echo '</div>';

		//echo $form->input('password');
	?>
	</fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>