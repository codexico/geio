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

        //echo $form->input('user_id');
        echo $form->input('User.username', array('div' => 'input text mgt20', 'label' => 'Nome de Usu&aacute;rio'));

        //That effectively eliminates the annoying Auth habit of hashing your password.
        echo $form->input('User.passwd', array('label' => 'Senha'));
        echo $form->input('User.passwd_confirm', array('type' => 'password', 'label' => 'Repita a senha'));

        echo $form->input('nome');
        echo $form->input('email', array('label' => 'E-mail'));
        
        echo $form->input('rg', array('label' => 'RG'));
        echo $form->input('cpf', array('label' => 'CPF (somente n&uacute;meros)'));
        
        echo $form->input('tel', array('label' => 'Telefone (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));
        echo $form->input('cel', array('label' => 'Celular (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));

        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observações'));
        ?>
    </fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>