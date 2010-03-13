<div class="consumidores form">
<?php echo $form->create('Consumidor');?>
	<fieldset>
 		<legend><?php __('Edit Consumidor');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nome');
		echo $form->input('rg');
		echo $form->input('cpf');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Consumidor.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Consumidor.id'))); ?></li>
		<li><?php echo $html->link(__('List Consumidores', true), array('action' => 'index'));?></li>
	</ul>
</div>
