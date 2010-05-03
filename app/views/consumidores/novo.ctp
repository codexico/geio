<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */

//javascripts para a busca de cep
$javascript->link(array("prototype.js", "funcoes.js"), false);

//
$javascript->link(array('consumidor_novo'), false);// false para ir em <head>
?>

<div class="consumidores form mgt20">
    <?php echo $form->create('Consumidor', array('action' => 'novo', 'onsubmit'=>'return confirm("Confirma?")'));?>
    <fieldset>
        <legend><?php __('Adicionar Novo Consumidor');?></legend>
        <?php

        echo $form->input('nome', array('div' => 'input text mgt20'));

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

        echo $form->input('profissao');

        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observações'));




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

        echo '<div class="duas_colunas">';
        echo $form->input('numero', array('label'=>'Número', 'div'=>'input meio_input'));
        echo $form->input('complemento', array('div'=>'input meio_input'));
        echo '</div>';

        echo $form->input('bairro');

        echo '<div class="duas_colunas">';
        echo $form->input('estado', array('options' => $estados,
        'empty'=>'Selecione',
        'div' => 'input meio_input'));
        echo $form->input('cidade', array('div'=>'input meio_input'));
        echo '</div>';


        echo $form->input('pais', array('options' => $paises,
        'empty'=>'Selecione'));

        ?>
    </fieldset>
    <?php echo $form->end(array('label'=>'Salvar e ir para o Cadastro de Cupons','class'=>'submit', 'div'=>'submit submit_botoes'));?>
</div>


<?php /*
<div class="actions">

    <ul>
        <li><?php echo $html->link(__('List Consumidores', true), array('action' => 'index'));?></li>
    </ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
*/ ?>