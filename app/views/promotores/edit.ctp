<?php
//debug($this->data['Promotor']);
?>
<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Promotor</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/promotores', array('class'=>'btn_cinza floatRight mgr5')); ?>
	<?php echo $html->link('Trocar Senha', '/promotores/senha/'.$this->data['Promotor']['id'], array('class'=>'btn_cinza floatRight mgr5')); ?>
    <?php echo $html->link('Excluir Usuario', array('action' => 'delete', $form->value('Usuario.id')), array('class'=>'btn_azul floatRight mgr5'),
            sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Usuario.id'))); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="promotores form">
<?php echo $form->create('Promotor');?>
	<fieldset>
 		<legend>Dados Gerais</legend>
	<?php
		echo $form->input('id');
		echo $form->input('nome', array('div' => 'input text mgt20', 'label' => 'Nome Completo'));
		echo $form->input('email', array('label' => 'E-mail'));

        echo '<div class="duas_colunas">';
	        echo $form->input('rg', array('label' => 'RG', 'div' =>'input text meio_input'));
	        echo $form->input('cpf', array('label' => 'CPF (somente n&uacute;meros)', 'div' =>'input text meio_input'));
        echo '</div>';

        echo '<div class="duas_colunas">';
			echo $form->input('tel', array('label' => 'Telefone', 'div' =>'input text meio_input'));
			echo $form->input('cel', array('label' => 'Celular', 'div' =>'input text meio_input'));
        echo '</div>';

        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observa&ccedil;&otilde;es'));
	?>
	</fieldset>
    <?php echo $form->end(array('label'=>'SALVAR','class'=>'submit'));?>
</div>