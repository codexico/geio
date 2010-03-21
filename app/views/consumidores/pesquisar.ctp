<?php
$javascript->link(array('jquery-1.4.2.min'), false);// false para ir em <head>
$javascript->link(array('pesquisar'), false);

?>
                <?php $session->flash('Impressora'); ?>
<div class="consumidores procurar">
    <fieldset>
        <legend><?php __('Procurar Consumidor');?></legend>
        <?php

        echo $form->input('rg', array('label' => 'RG'));
        echo $form->button('Pesquisar por RG', array('id' => 'pesquisarrg'));

        echo $form->input('cpf', array('label' => 'CPF (somente números)'));
        echo $form->button('Pesquisar por CPF', array('id' => 'pesquisarcpf'));
        
        echo $html->link('Novo Consumidor', array('action'=>'novo'));
        ?>
    </fieldset>
</div>
<div id="consumidorencontrado">
</div>
<?php /*
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('List Consumidores', true), array('action' => 'index'));?></li>
    </ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>

 */ ?>