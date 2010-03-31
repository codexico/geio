<div class="paises form">
<?php echo $form->create('Paise');?>
	<fieldset>
 		<legend><?php __('Add Paise');?></legend>
	<?php
		echo $form->input('iso');
		echo $form->input('iso3');
		echo $form->input('numcode');
		echo $form->input('nome');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Paises', true), array('action' => 'index'));?></li>
	</ul>
</div>
