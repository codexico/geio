<div class="funcionarios form">
<?php echo $form->create('Funcionario');?>
	<fieldset>
 		<legend><?php __('Edit Funcionario');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nome');
		echo $form->input('rg');
		echo $form->input('cpf');
		echo $form->input('loja_id');
		echo $form->input('tel');
		echo $form->input('cel');
		echo $form->input('email');
		echo $form->input('sexo');
		echo $form->input('nascimento');
		echo $form->input('profissao');
		echo $form->input('obs');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Funcionario.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Funcionario.id'))); ?></li>
		<li><?php echo $html->link(__('List Funcionarios', true), array('action' => 'index'));?></li>
	</ul>
</div>
