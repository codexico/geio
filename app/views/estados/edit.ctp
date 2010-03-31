<div class="estados form">
<?php echo $form->create('Estado');?>
	<fieldset>
 		<legend><?php __('Edit Estado');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('paise_id');
		echo $form->input('sigla');
		echo $form->input('estado');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Estado.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Estado.id'))); ?></li>
		<li><?php echo $html->link(__('List Estados', true), array('action' => 'index'));?></li>
	</ul>
</div>
