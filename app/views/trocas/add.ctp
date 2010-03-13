<div class="trocas form">
<?php echo $form->create('Troca');?>
	<fieldset>
 		<legend><?php __('Add Troca');?></legend>
	<?php
		echo $form->input('valor_total');
		echo $form->input('qtd_CF');
		echo $form->input('qtd_CP');
		echo $form->input('promotor_id');
		echo $form->input('consumidor_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Trocas', true), array('action' => 'index'));?></li>
	</ul>
</div>
