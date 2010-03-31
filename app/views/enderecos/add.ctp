<div class="enderecos form">
<?php echo $form->create('Endereco');?>
	<fieldset>
 		<legend><?php __('Add Endereco');?></legend>
	<?php
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
		<li><?php echo $html->link(__('List Enderecos', true), array('action' => 'index'));?></li>
	</ul>
</div>
