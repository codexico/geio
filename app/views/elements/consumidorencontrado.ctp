
<div class="consumidores form">
    <p>
        <?php echo $html->link('Aceitar e ir para o cadastro de Cupons', array('controller'=>'trocas','action' => 'nova', $consumidor['Consumidor']['id'])); ?>
    </p>
    <?php echo $form->create('Consumidor');?>
    <fieldset>
        <legend>Dados Gerais</legend>
        <?php
        echo $form->input('id');
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
					'gls'=>'gls'
			),
			'selected' => $this->data['Consumidor']['sexo'],
			'empty' => true,
			'div' => 'input meio_input'));

			echo '<div class="input select">';
				echo '<label for="ConsumidorNascimentoDay">Nascimento</label>';
				echo $form->day('nascimento', '', array('class'=>'select_dia'), true);
				echo $form->month('nascimento', '', array('class'=>'select_mes'), true);
				echo $form->year('nascimento', 1900, 2010, true, array('class'=>'select_ano'));
			echo '</div>';
        echo '</div>';

        echo '<div class="duas_colunas">';
			echo $form->input('estado_civil', array('options' => array(
					'solteiro'=>'Solteiro',
					'casado'=>'Casado',
					'viúvo'=>'Viúvo',
					'separado'=>'Separado'
			),
			'selected' => $this->data['Consumidor']['estado_civil'],
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
			'selected' => $this->data['Consumidor']['grau_de_instrucao'],
			'empty' => true,
			'div' => 'input meio_input'));
        echo '</div>';





        echo $form->input('profissao', array('label' => 'Profiss&atilde;o'));
        //echo $form->input('obs');
        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observa&ccedil;&otilde;es'));



        echo $form->input('cep', array('id'=>'cep', 'maxlength' => 8, 'label' => 'CEP (exatamente 8 números)',
        'style'=>'width: 108px',
        'onkeyup'=>'javascript:saiCep(this.value.length);')); //Quando sair do campo cep chama a função javascript saiCep()

        echo $html->image('loading.gif', array('id'=>'loading',
        'style'=>'display:none')); //Imagem de loading no código, mas não exibida na página

        $opcoes=array('label'=>'Rua/Avenida',
                'style'=>'width: 500px');
        echo $form->input('endereco', $opcoes);

        /*
		* Observa o campo cujo id é 'cep', quando seu conteúdo for modificado "executa" a action 'endereco_cep'
		* do controller 'clientes' e atualiza o resultado no campo cujo id é 'ConsumidorEndereco'
		* Mais informações sobre observeField em: http://book.cakephp.org/pt/view/630/observeField
        */
        echo $ajax->observeField('cep',
        array(
        'update' => 'ConsumidorEndereco',
        'url' => array('controller' => 'consumidores',
                'action' => 'endereco_cep')
        )
        );

        $opcoes=array('label'=>'Número',
                'style'=>'width: 60px');
        echo $form->input('numero', $opcoes);
        echo $form->input('complemento', array('style'=>'width: 200px'));
        echo $form->input('bairro', array('style'=>'width: 200px'));
        echo $form->input('cidade', array('style'=>'width: 200px'));

        echo $form->input('estado', array('options' => $estados,
        'empty'=>'Selecione'));


        echo $form->input('pais', array('options' => $paises,
        'empty'=>'Selecione'));


        ?>
    </fieldset>
    <?php echo $form->end(array('label'=>'EDITAR E IR PARA CUPONS','class'=>'submit'));?>
</div>
<?php /*
<div class="consumidores view">
    <h2><?php  __('Consumidor');?></h2>
    <p>
        <?php echo $html->link('Aceitar e ir para o cadastro de Cupons', array('controller'=>'trocas','action' => 'nova', $consumidor['Consumidor']['id'])); ?>
    </p>
    <dl>
        <?php $i = 0;
        $class = ' class="altrow"';?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['nome']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rg'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['rg']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cpf'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['cpf']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['email']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cel'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['cel']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tel'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['tel']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sexo'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['sexo']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nascimento'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo date('d/m/Y', strtotime($consumidor['Consumidor']['nascimento']) ); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado Civil'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['estado_civil']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grau De Instrução'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['grau_de_instrucao']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Profissão'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['profissao']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CEP'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['cep']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Endereço'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['endereco']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Número'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['numero']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bairro'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['bairro']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cidade'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['cidade']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['estado']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Complemento'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['complemento']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('País'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['pais']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Obs'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $consumidor['Consumidor']['obs']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo date('d/m/Y - H:m',strtotime($consumidor['Consumidor']['created'])); ?>
            &nbsp;
        </dd>
    </dl>
    <p>
        <?php echo $html->link(__('Edit Consumidor', true), array('action' => 'edit', $consumidor['Consumidor']['id'])); ?>
    </p>
</div>
*/?>