<div class="profissoes form">
<?php echo $form->create('Profissao');?>
	<fieldset>
 		<legend><?php __('Edit Profissao');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Profissao.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Profissao.id'))); ?></li>
		<li><?php echo $html->link(__('List Profissoes', true), array('action' => 'index'));?></li>
	</ul>
</div>
