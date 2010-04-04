<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1><?php __('Inserir Funcionário');?></h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/funcionarios', array('class'=>'btn_cinza floatRight')); ?>
</div>

<div class="funcionarios form">
    <?php echo $form->create('Funcionario');?>
    <fieldset>
        <legend><?php __('Dados Gerais');?></legend>
        <?php
        echo $form->input('nome', array('label' => 'Nome:'));
        echo $form->input('rg', array('label' => 'RG:'));
        echo $form->input('cpf', array('label' => 'CPF (somente números):'));
        echo $form->input('loja_id', array('label' => 'Loja:'));

        echo $form->input('tel', array('label' => 'Telefone:'));
        echo $form->input('cel', array('label' => 'Celular:'));
        echo $form->input('email', array('label' => 'E-mail:'));

        echo $form->input('sexo', array('label' => 'Sexo:', 'options' => array(
                'masculino'=>'Masculino',
                'feminino'=>'Feminino',
                'gls'=>'GLS',
                'outro'=>'Outro'
        ),
        'selected'=>'',
        'empty' => true));

        //echo $form->input('nascimento');


        echo $form->input('nascimento',array(
        'dateFormat'=>'DMY',
        'timeFormat'=>'NONE',
        'minYear'=> date('Y') - 100,
        'maxYear' => date('Y'),
        'selected'=>'',
        //'selected'=>strtotime('01-01-2000'),
        'empty' => true
        )
        );

        echo $form->input('profissao');
        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observações'));
        ?>
    </fieldset>
    <?php echo $form->end('ENVIAR');?>
</div>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('List Funcionarios', true), array('action' => 'index'));?></li>
    </ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
