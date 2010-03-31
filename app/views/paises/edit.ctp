<div class="paises form">
<?php echo $form->create('Paise');?>
	<fieldset>
 		<legend><?php __('Edit Paise');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('iso');
		echo $form->input('iso3');
		echo $form->input('numcode');
		echo $form->input('nome');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Paise.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Paise.id'))); ?></li>
		<li><?php echo $html->link(__('List Paises', true), array('action' => 'index'));?></li>
	</ul>
</div>
