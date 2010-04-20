<div class="entradas form">
<?php echo $form->create('Entrada');?>
	<fieldset>
 		<legend><?php __('Add Entrada');?></legend>
	<?php
		echo $form->input('brinde_id');
		echo $form->input('qtd');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Entradas', true), array('action' => 'index'));?></li>
	</ul>
</div>
