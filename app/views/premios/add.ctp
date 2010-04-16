<div class="premios form">
<?php echo $form->create('Premio');?>
	<fieldset>
 		<legend><?php __('Add Premio');?></legend>
	<?php
		echo $form->input('troca_id');
		echo $form->input('consumidor_id');
		echo $form->input('promotor_id');
		echo $form->input('model');
		echo $form->input('foreign_key');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Premios', true), array('action' => 'index'));?></li>
	</ul>
</div>
