<div class="cidades form">
<?php echo $form->create('Cidade');?>
	<fieldset>
 		<legend><?php __('Add Cidade');?></legend>
	<?php
		echo $form->input('estado_id');
		echo $form->input('cidade');
		echo $form->input('cep');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Cidades', true), array('action' => 'index'));?></li>
	</ul>
</div>
