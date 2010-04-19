<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Funcion&aacute;rio</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/funcionarios', array('class'=>'btn_cinza floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>

<div class="funcionarios form">
<?php echo $form->create('Funcionario');?>
	<fieldset>
        <legend>Dados Gerais</legend>
        <?php
		echo $form->input('id');
        echo $form->input('nome', array('div' => 'input text mgt20', 'label' => 'Nome'));
        echo $form->input('rg', array('label' => 'RG'));
        echo $form->input('cpf', array('label' => 'CPF (somente n&uacute;meros)'));
        echo $form->input('loja_id', array('label' => 'Loja'));
        echo $form->input('tel', array('label' => 'Telefone'));
        echo $form->input('cel', array('label' => 'Celular'));
        echo $form->input('email', array('label' => 'E-mail'));

        echo $form->input('sexo', array('label' => 'Sexo', 'options' => array(
                'masculino'=>'Masculino',
                'feminino'=>'Feminino',
                'gls'=>'GLS',
                'outro'=>'Outro'
        ),
        'selected'=>'',
        'empty' => true));
        ?>

		<div class="input select">
			<label for="FuncionarioSexo">Nascimento</label>
			 <?php echo $form->day('nascimento', '', array('class'=>'select_dia'), true); ?>
			 <?php echo $form->month('nascimento', '', array('class'=>'select_mes'), true); ?>
			 <?php echo $form->year('nascimento', 1900, 2010, true, array('class'=>'select_ano')); ?>
		</div>

		 <?php 
        echo $form->input('profissao', array('label' => 'Profiss&atilde;o'));
        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observa&ccedil;&otilde;es'));
        ?>

	</fieldset>
    <?php echo $form->end(array('label'=>'SALVAR','class'=>'submit'));?>
</div>