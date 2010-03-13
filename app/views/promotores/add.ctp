<div class="promotores form">
<?php echo $form->create('Promotor');?>
	<fieldset>
 		<legend><?php __('Add Promotor');?></legend>
	<?php
		echo $form->input('nome');
		echo $form->input('email');
		echo $form->input('rg');
		echo $form->input('user_id');
		echo $form->input('tel');
		echo $form->input('cel');
		echo $form->input('obs');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Promotores', true), array('action' => 'index'));?></li>
	</ul>
</div>
