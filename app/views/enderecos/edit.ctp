<div class="enderecos form">
<?php echo $form->create('Endereco');?>
	<fieldset>
 		<legend><?php __('Edit Endereco');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('bairro_id');
		echo $form->input('cep');
		echo $form->input('logradouro');
		echo $form->input('complemento');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Endereco.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Endereco.id'))); ?></li>
		<li><?php echo $html->link(__('List Enderecos', true), array('action' => 'index'));?></li>
	</ul>
</div>
