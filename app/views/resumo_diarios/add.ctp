<div class="resumoDiarios form">
<?php echo $form->create('ResumoDiario');?>
	<fieldset>
 		<legend><?php __('Add ResumoDiario');?></legend>
	<?php
		echo $form->input('dia');
		echo $form->input('qtd_consumidores');
		echo $form->input('qtd_consumidores_novos');
		echo $form->input('qtd_cupons_fiscais');
		echo $form->input('qtd_cupons_promocionais');
		echo $form->input('valor_total');
		echo $form->input('valor_bandeira');
		echo $form->input('valor-outros');
		echo $form->input('ticket_medio_consumidor');
		echo $form->input('ticket_medio_cupom_fiscal');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List ResumoDiarios', true), array('action' => 'index'));?></li>
	</ul>
</div>
