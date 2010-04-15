<div class="brindes form">
<?php echo $form->create('Brinde');?>
	<fieldset>
 		<legend><?php __('Add Brinde');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('valor', array('label'=>'Valor em Cupons Fiscais'));
		echo $form->input('estoque_inicial');
		echo $form->input('estoque_atual');
		echo $form->input('obs');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Brindes', true), array('action' => 'index'));?></li>
	</ul>
</div>
