<div class="funcionarios form">
<?php echo $form->create('Funcionario');?>
	<fieldset>
 		<legend><?php __('Add Funcionario');?></legend>
	<?php
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
		<li><?php echo $html->link(__('List Funcionarios', true), array('action' => 'index'));?></li>
	</ul>
</div>
