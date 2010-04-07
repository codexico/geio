<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Inserir Usu&aacute;rio</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/users', array('class'=>'btn_cinza floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="users form">
    <?php echo $form->create('User');?>
    <fieldset>
        <legend>Dados Gerais</legend>
        <?php
        echo $form->input('username');

        //echo $form->input('password');
        //That effectively eliminates the annoying Auth habit of hashing your password.
        echo $form->input('passwd', array('label' => 'Senha'));
        echo $form->input('passwd_confirm', array('type' => 'password', 'label' => 'Repita a senha'));


        //echo $form->input('group_id');
        $label = "<label for='UserGroupId'>Grupo</label>";
        $select = $form->select('group_id', $groups, null, null, false);
        echo
        $html->div("input required select",
        $label . $select,
        null, null, false);

        ?>
    </fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>