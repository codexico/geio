<div class="bairros form">
<?php echo $form->create('Bairro');?>
	<fieldset>
 		<legend><?php __('Edit Bairro');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('cidade_id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Bairro.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Bairro.id'))); ?></li>
		<li><?php echo $html->link(__('List Bairros', true), array('action' => 'index'));?></li>
	</ul>
</div>
