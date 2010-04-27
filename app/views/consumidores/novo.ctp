<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */

//javascripts para a busca de cep
$javascript->link(array("prototype.js", "funcoes.js"), false);

//
$javascript->link(array('jquery-1.4.2.min', 'consumidor_novo'), false);// false para ir em <head>
?>

<div class="consumidores form mgt20">
    <?php echo $form->create('Consumidor', array('action' => 'novo', 'onsubmit'=>'return confirm("Confirma?")'));?>
    <fieldset>
        <legend><?php __('Adicionar Novo Consumidor');?></legend>
        <?php

        echo $form->input('nome');

        echo $form->input('rg', array('label' => 'RG'));
        echo $form->input('cpf', array('label' => 'CPF (somente números)'));
        echo $form->input('cel', array('label' => 'Celular (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));

        echo $form->input('tel', array('label' => 'Telefone (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));
        echo $form->input('email');


        //echo $form->input('sexo');
        echo $form->input('sexo', array('options' => array(
                'masculino'=>'masculino',
                'feminino'=>'feminino',
                'gls'=>'gls'
        ),
        'selected'=>$this->data['Consumidor']['sexo'],
        'empty' => true));

?>

		<div class="input select">
			<label for="ConsumidorNascimentoDay">Nascimento</label>
			 <?php echo $form->day('nascimento', '', array('class'=>'select_dia'), true); ?>
			 <?php echo $form->month('nascimento', '', array('class'=>'select_mes'), true); ?>
			 <?php echo $form->year('nascimento', 1900, 2010, true, array('class'=>'select_ano')); ?>
		</div>

<?php

        //echo $form->input('estado_civil');
        $estado_civil ='';
        if(isset ($this->data['Consumidor']['estado_civil'])){$estado_civil = $this->data['Consumidor']['estado_civil'];}
        echo $form->input('estado_civil', array('options' => array(
                'solteiro'=>'solteiro',
                'casado'=>'casado',
                'viúvo'=>'viúvo',
                'separado'=>'separado'
        ),
        'selected'=>$estado_civil,
        'empty' => true));

        //echo $form->input('grau_de_instrucao');
        $grau_de_instrucao ='';
        if(isset ($this->data['Consumidor']['grau_de_instrucao'])){$grau_de_instrucao = $this->data['Consumidor']['grau_de_instrucao'];}
        echo $form->input('grau_de_instrucao', array('options' => array(
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
        'selected'=>$grau_de_instrucao,
        'empty' => true));

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
    <?php echo $form->end('Salvar e ir para o Cadastro de Cupons');?>
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