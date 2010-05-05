<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
//debug($this->data['Usuario']);
?>
<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Usuario</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/usuarios', array('class'=>'btn_cinza floatRight mgr5')); ?>
</div>

<?php $session->flash(); ?>

<div class="usuarioes form">
<?php echo $form->create('User', array('url' => '/usuarios/senha/'.$usuario['Usuario']['id']));?>
	<fieldset>
 		<legend>Dados Gerais</legend>
	<?php
		echo $form->input('id');

        //That effectively eliminates the annoying Auth habit of hashing your password.

        echo '<div class="duas_colunas">';
	        echo $form->input('User.passwd', array('label' => 'Senha', 'div' =>'input text meio_input'));
			echo $form->input('User.passwd_confirm', array('type' => 'password', 'label' => 'Repita a senha', 'div' =>'input text meio_input'));
        echo '</div>';

	?>
	</fieldset>
    <?php echo $form->end(array('label'=>'SALVAR','class'=>'submit'));?>
</div>