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
                'gls'=>'gls',
                'outro'=>'outro'
        ),
        'selected'=>'',
        'empty' => true));

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

        //echo $form->input('estado_civil');
        echo $form->input('estado_civil', array('options' => array(
                'solteiro'=>'solteiro',
                'casado'=>'casado',
                'viúvo'=>'viúvo',
                'separado'=>'separado'
        ),
        'selected'=>'',
        'empty' => true));

        //echo $form->input('grau_de_instrucao');
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
        'selected'=>'',
        'empty' => true));

        echo $form->input('profissao');

        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observações'));
        ?>
    </fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>