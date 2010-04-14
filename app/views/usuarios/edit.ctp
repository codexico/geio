<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Editar Usu&aacute;rio</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
    <?php echo $html->link('Voltar', '/usuarios', array('class'=>'btn_cinza floatRight')); ?>
    <?php echo $html->link('Excluir Usuario', array('action' => 'delete', $form->value('Usuario.id')), array('class'=>'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Usuario.id'))); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>

<div class="usuarios form">
    <?php echo $form->create('Usuario');?>
    <fieldset>
        <legend>Dados Gerais</legend>
        <?php
        echo $form->input('id');
        //echo $form->input('User.username', array('div' => 'input text mgt20', 'label' => 'Login (nome que será usado para acessar o sistema)'));
        echo $form->input('nome', array('div' => 'input text mgt20', 'label' => 'Nome'));
        echo $form->input('email', array('div' => 'input text mgt20', 'label' => 'E-mail'));
        //echo $form->input('user_id');
        ?>
    </fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>