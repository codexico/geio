<div class="consumidores form">
<?php echo $form->create('Consumidor');?>
	<fieldset>
 		<legend><?php __('Add Consumidor');?></legend>
	<?php
		echo $form->input('nome');
		echo $form->input('rg');
		echo $form->input('cpf');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Consumidores', true), array('action' => 'index'));?></li>
	</ul>
</div>
