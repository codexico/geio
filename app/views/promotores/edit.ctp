<div class="promotores form">
<?php echo $form->create('Promotor');?>
	<fieldset>
 		<legend><?php __('Edit Promotor');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nome');
		echo $form->input('email');
		echo $form->input('rg');
		//echo $form->hidden('user_id');
		//echo $form->hidden('User.id');
		//echo $form->input('User.username', array('label' => 'Login'));
        echo $form->input('cpf', array('label' => 'CPF (somente números)'));

        echo $form->input('tel', array('label' => 'Telefone (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));
        echo $form->input('cel', array('label' => 'Celular (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));

        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observações'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Promotor.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Promotor.id'))); ?></li>
		<li><?php echo $html->link(__('List Promotores', true), array('action' => 'index'));?></li>
	</ul>
</div>
