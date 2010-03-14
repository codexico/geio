<?php
//debug($this->data);
?>
<div class="consumidores form">
    <?php echo $form->create('Consumidor');?>
    <fieldset>
        <legend><?php __('Edit Consumidor');?></legend>
        <?php
        echo $form->input('id');
        echo $form->input('nome');
        echo $form->input('rg');
        echo $form->input('cpf');
        echo $form->input('email');
        echo $form->input('cel');
        echo $form->input('tel');

        //echo $form->input('sexo');
        echo $form->input('sexo', array('options' => array(
                'masculino'=>'masculino',
                'feminino'=>'feminino',
                'gls'=>'gls',
                'outro'=>'outro'
        ),
        'selected' => $this->data['Consumidor']['sexo'],
        'empty' => true));

        //echo $form->input('nascimento');
        echo $form->input('nascimento',array(
        'dateFormat'=>'DMY',
        'timeFormat'=>'NONE',
        'minYear'=> date('Y') - 100,
        'maxYear' => date('Y'),
        //'selected'=>'',
        'selected' => $this->data['Consumidor']['nascimento'],
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
        'selected' => $this->data['Consumidor']['estado_civil'],
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
        'selected' => $this->data['Consumidor']['grau_de_instrucao'],
        'empty' => true));

        echo $form->input('profissao');
        //echo $form->input('obs');
        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observações'));
        ?>
    </fieldset>
    <?php echo $form->end('Submit');?>
</div>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Consumidor.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Consumidor.id'))); ?></li>
        <li><?php echo $html->link(__('List Consumidores', true), array('action' => 'index'));?></li>
    </ul>
</div>
