<div class="bairros form">
<?php echo $form->create('Bairro');?>
	<fieldset>
 		<legend><?php __('Add Bairro');?></legend>
	<?php
		echo $form->input('cidade_id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Bairros', true), array('action' => 'index'));?></li>
	</ul>
</div>
