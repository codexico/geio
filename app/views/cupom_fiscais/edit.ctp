<div class="cupomFiscais form">
<?php echo $form->create('CupomFiscal');?>
	<fieldset>
 		<legend><?php __('Edit CupomFiscal');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('codigo');
		echo $form->input('troca_id');
		echo $form->input('loja_id');
		echo $form->input('valor');
		echo $form->input('forma_de_pagamento');
		echo $form->input('bandeira');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('CupomFiscal.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('CupomFiscal.id'))); ?></li>
		<li><?php echo $html->link(__('List CupomFiscais', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Trocas', true), array('controller' => 'trocas', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Troca', true), array('controller' => 'trocas', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Lojas', true), array('controller' => 'lojas', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Loja', true), array('controller' => 'lojas', 'action' => 'add')); ?> </li>
	</ul>
</div>
