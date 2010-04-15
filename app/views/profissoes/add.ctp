<div class="profissoes form">
<?php echo $form->create('Profissao');?>
	<fieldset>
 		<legend><?php __('Add Profissao');?></legend>
	<?php
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Profissoes', true), array('action' => 'index'));?></li>
	</ul>
</div>
