<div class="entradas form">
<?php echo $form->create('Entrada');?>
	<fieldset>
 		<legend><?php __('Edit Entrada');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('brinde_id');
		echo $form->input('qtd');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Entrada.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Entrada.id'))); ?></li>
		<li><?php echo $html->link(__('List Entradas', true), array('action' => 'index'));?></li>
	</ul>
</div>
