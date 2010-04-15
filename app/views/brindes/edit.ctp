<div class="brindes form">
<?php echo $form->create('Brinde');?>
	<fieldset>
 		<legend><?php __('Edit Brinde');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('valor');
		echo $form->input('estoque_inicial');
		echo $form->input('estoque_atual');
		echo $form->input('obs');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Brinde.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Brinde.id'))); ?></li>
		<li><?php echo $html->link(__('List Brindes', true), array('action' => 'index'));?></li>
	</ul>
</div>
