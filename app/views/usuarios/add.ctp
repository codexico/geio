<div class="usuarios form">
<?php echo $form->create('Usuario');?>
	<fieldset>
 		<legend><?php __('Add Usuario');?></legend>
	<?php
		echo $form->input('nome');
		echo $form->input('user_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Usuarios', true), array('action' => 'index'));?></li>
	</ul>
</div>
