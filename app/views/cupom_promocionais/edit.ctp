<div class="cupomPromocionais form">
<?php echo $form->create('CupomPromocional');?>
	<fieldset>
 		<legend><?php __('Edit CupomPromocional');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('troca_id');
		echo $form->input('promotor_id');
		echo $form->input('consumidor_id');
		echo $form->input('data_impressao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('CupomPromocional.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('CupomPromocional.id'))); ?></li>
		<li><?php echo $html->link(__('List CupomPromocionais', true), array('action' => 'index'));?></li>
	</ul>
</div>
