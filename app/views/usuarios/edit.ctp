<div class="usuarios form">
<?php echo $form->create('Usuario');?>
	<fieldset>
 		<legend><?php __('Edit Usuario');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nome');
		echo $form->input('email');
		echo $form->input('user_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Usuario.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Usuario.id'))); ?></li>
		<li><?php echo $html->link(__('List Usuarios', true), array('action' => 'index'));?></li>
	</ul>
</div>
