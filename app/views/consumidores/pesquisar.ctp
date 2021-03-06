<?php
//javascripts para a busca de cep
$javascript->link(array("prototype.js", "funcoes.js"), false);

$javascript->link(array('consumidor_pesquisar'), false);//usa jquery
?>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Procurar Consumidores</h1>
</div>
<div class="clear"></div>

<!-- .botoes
<div class="botoes">
<?php echo $html->link('Inserir Promotor', array('action' => 'novo'), array('class' => 'btn_azul floatRight')); ?>
</div>
-->
<?php $session->flash('Impressora'); ?>
<?php $session->flash(); ?>

<div class="consumidores form">
    <fieldset>
        <legend><?php __('Pesquisar por RG');?></legend>
        <?php
        echo $form->input('rg', array('label' => 'RG', 'div' => 'input text mgt20'));
        ?>
    </fieldset>
    <div class="submit">
        <?php
        echo $form->button('PESQUISAR', array('id' => 'pesquisarrg','class'=>'submit'));
        ?>
    </div>
</div>

<div class="consumidores form mgt20">
    <fieldset>
        <legend><?php __('Pesquisar por CPF');?></legend>
        <?php
        echo $form->input('cpf', array('label' => 'CPF (somente números)', 'div' => 'input text mgt20'));
        ?>
    </fieldset>
    <div class="submit">
        <?php
        echo $form->button('PESQUISAR', array('id' => 'pesquisarcpf','class'=>'submit'));
        ?>
    </div>
</div>

<div id="consumidorencontrado">
    <?php /* view/elements/consumidorencontrado */?>
</div>