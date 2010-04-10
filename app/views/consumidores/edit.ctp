<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */

//javascripts para a busca de cep
$javascript->link(array("prototype.js", "funcoes.js"), false);

//
$javascript->link(array('jquery-1.4.2.min', 'consumidor_novo'), false);// false para ir em <head>
?>
<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Consumidor</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/consumidores', array('class'=>'btn_cinza floatRight')); ?>

            <?php if ($session->read('Auth.User.group_id') == 1) : /*admin*/ ?>
	<?php echo $html->link('Excluir Consumidor', array('action' => 'delete', $form->value('Consumidor.id')), array('class'=>'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Consumidor.id'))); ?>
    <?php endif; ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<?php
//debug($this->data);
?>
<div class="consumidores form">
    <?php echo $form->create('Consumidor');?>
    <fieldset>
        <legend>Dados Gerais</legend>
        <?php
        echo $form->input('id');
        echo $form->input('nome', array('div' => 'input text mgt20', 'label' => 'Nome'));

        echo $form->input('rg', array('label' => 'RG'));
        echo $form->input('cpf', array('label' => 'CPF (somente números)'));
        echo $form->input('cel', array('label' => 'Celular (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));
        echo $form->input('tel', array('label' => 'Telefone (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));

        echo $form->input('email', array('label' => 'E-mail'));
        
        //echo $form->input('sexo');
        echo $form->input('sexo', array('options' => array(
                'masculino'=>'masculino',
                'feminino'=>'feminino',
                'gls'=>'gls'
        ),
        'selected' => $this->data['Consumidor']['sexo'],
        'empty' => true));
?>

		<div class="input select">
			<label for="ConsumidorNascimentoDay">Nascimento</label>
			 <?php echo $form->day('nascimento', '', array('class'=>'select_dia'), true); ?>
			 <?php echo $form->month('nascimento', '', array('class'=>'select_mes'), true); ?>
			 <?php echo $form->year('nascimento', 1900, 2010, true, array('class'=>'select_ano')); ?>
		</div>

<?php

        echo $form->input('estado_civil', array('options' => array(
                'solteiro'=>'solteiro',
                'casado'=>'casado',
                'viúvo'=>'viúvo',
                'separado'=>'separado'
        ),
        'selected' => $this->data['Consumidor']['estado_civil'],
        'empty' => true));

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
        'empty' => true));

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
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>