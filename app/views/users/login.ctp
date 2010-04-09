<!-- .form -->
<div class="login form mgb20">

	<!-- .titulo -->
	<div class="titulo">
		<?php echo $html->image('bullet_titulo.gif')?>
		<h1>Autentica&ccedil;&atilde;o</h1>
	</div>
	<div class="clear"></div>

	<?php $session->flash('auth'); ?>
	<?php $session->flash(); ?>

	<?php
	echo $form->create('User', array('action' => 'login'));

        echo $form->input('username', array('div' => 'input text mgt20', 'label' => 'Usuário','class' => 'meio_input'));
        echo $form->input('password', array('label' => 'Senha','class' => 'meio_input'));
//
//	echo $form->inputs(array(
//		'legend' => __('', true),
//		'username' => array('class' => 'meio_input'),
//		'password' => array('class' => 'meio_input')
//	));
	echo $form->end(array('label'=>'ENTRAR','class'=>'submit '));
	?>
	<div class="clear"></div>
</div>
