<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Inserir Promotor</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/promotores', array('class'=>'btn_cinza floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="promotores form">
    <?php echo $form->create('Promotor');?>
    <fieldset>
        <legend>Dados Gerais</legend>
        <?php

        echo $form->input('User.username', array('div' => 'input text mgt20', 'label' => 'Login'));

        //That effectively eliminates the annoying Auth habit of hashing your password.

        echo '<div class="duas_colunas">';
	        echo $form->input('User.passwd', array('label' => 'Senha', 'div' =>'input text meio_input'));
			echo $form->input('User.passwd_confirm', array('type' => 'password', 'label' => 'Repita a senha', 'div' =>'input text meio_input'));
        echo '</div>';

        echo $form->input('nome');
        echo $form->input('email', array('label' => 'E-mail'));

        echo '<div class="duas_colunas">';
	        echo $form->input('rg', array('label' => 'RG', 'div' =>'input text meio_input'));
	        echo $form->input('cpf', array('label' => 'CPF (somente n&uacute;meros)', 'div' =>'input text meio_input'));
        echo '</div>';

        echo '<div class="duas_colunas">';
			echo $form->input('tel', array('label' => 'Telefone', 'div' =>'input text meio_input'));
			echo $form->input('cel', array('label' => 'Celular', 'div' =>'input text meio_input'));
        echo '</div>';
        

        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observações'));
        ?>
    </fieldset>
    <?php echo $form->end(array('label'=>'SALVAR','class'=>'submit'));?>
</div>