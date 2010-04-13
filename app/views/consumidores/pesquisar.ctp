<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Procurar Consumidores</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Inserir Promotor', array('action' => 'novo'), array('class' => 'btn_azul floatRight')); ?>
</div>

<?php
	$javascript->link(array('jquery-1.4.2.min'), false);// false para ir em <head>
	$javascript->link(array('pesquisar'), false);
?>

<?php $session->flash('Impressora'); ?>
<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>

<div class="consumidores form">
    <fieldset>
        <legend><?php __('Pesquisar por RG');?></legend>
        <?php
			echo $form->input('rg', array('label' => 'RG', 'div' => 'input text mgt20'));

        ?>
    </fieldset>
	<?php
		echo '<div class="submit">';
			echo $form->button('PESQUISAR', array('id' => 'pesquisarrg','class'=>'submit'));
		echo '</div>';
	?>
</div>

<div class="consumidores form mgt20">
    <fieldset>
        <legend><?php __('Pesquisar por CPF');?></legend>
        <?php
			echo $form->input('cpf', array('label' => 'CPF (somente números)', 'div' => 'input text mgt20'));
        ?>
    </fieldset>
	<?php
		echo '<div class="submit">';
			echo $form->button('PESQUISAR', array('id' => 'pesquisarcpf','class'=>'submit'));
		echo '</div>';
	?>
</div>

<div id="consumidorencontrado">
	<?php /* view/elements/consumidorencontrado */?>
</div>