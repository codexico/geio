<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Inserir Consumidor</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/consumidores', array('class'=>'btn_cinza floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>

<div class="consumidores form">
    <?php echo $form->create('Consumidor');?>
    <fieldset>
        <legend>Dados Gerais</legend>
        <?php

        echo $form->input('nome', array('div' => 'input text mgt20', 'label' => 'Nome'));

        echo '<div class="duas_colunas">';
			echo $form->input('rg', array('label' => 'RG', 'div' =>'input text meio_input'));
			echo $form->input('cpf', array('label' => 'CPF (somente números)', 'div' =>'input text meio_input'));
        echo '</div>';

        echo '<div class="duas_colunas">';
			echo $form->input('tel', array('label' => 'Telefone', 'div' =>'input text meio_input'));
			echo $form->input('cel', array('label' => 'Celular', 'div' =>'input text meio_input'));
        echo '</div>';

        echo $form->input('email', array('label' => 'E-mail'));


        echo '<div class="duas_colunas">';
			echo $form->input('sexo', array('options' => array(
					'masculino'=>'masculino',
					'feminino'=>'feminino',
					'gls'=>'gls',
					'outro'=>'outro'
			),
			'selected'=>'',
			'empty' => true,
			'div' => 'input meio_input'));

			echo '<div class="input select">';
				echo '<label for="ConsumidorNascimentoDay">Nascimento</label>';
				echo $form->day('nascimento', '', array('class'=>'select_dia'), true) ;
				echo $form->month('nascimento', '', array('class'=>'select_mes'), true) ;
				echo $form->year('nascimento', 1900, 2010, true, array('class'=>'select_ano')) ;
			echo '</div>';
        echo '</div>';

        echo '<div class="duas_colunas">';
			echo $form->input('estado_civil', array('options' => array(
					'solteiro'=>'Solteiro',
					'casado'=>'Casado',
					'viúvo'=>'Viúvo',
					'separado'=>'Separado'
			),
			'selected'=>'',
			'empty' => true,
			'div' => 'input meio_input'));

			echo $form->input('grau_de_instrucao', array('label' => 'Grau de Instru&ccedil;&atilde;o', 'options' => array(
					'nenhum'=>'nenhum',
					'1º Grau'=>'1º Grau',
					'2º Grau'=>'2º Grau',
					'Técnico'=>'Técnico',
					'Universitário'=>'Univesitário',
					'Mestrado'=>'Mestrado',
					'Doutorado'=>'Doutorado',
					'Pós'=>'Pós',
					'MBA'=>'MBA'
			),
			'selected'=>'',
			'empty' => true,
			'div' => 'input meio_input'));
        echo '</div>';



        echo $form->input('profissao', array('label' => 'Profiss&atilde;o'));

        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observa&ccedil;&otilde;es'));
        ?>
    </fieldset>
    <?php echo $form->end(array('label'=>'SALVAR','class'=>'submit'));?>
</div>