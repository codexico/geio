<div class="funcionarios form">
    <?php echo $form->create('Funcionario');?>
    <fieldset>
        <legend><?php __('Add Funcionario');?></legend>
        <?php
        echo $form->input('nome');
        echo $form->input('rg');
        echo $form->input('cpf', array('label' => 'CPF (somente números)'));
        echo $form->input('loja_id');

        echo $form->input('tel');
        echo $form->input('cel');
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
    <?php echo $form->end('Submit');?>
</div>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('List Funcionarios', true), array('action' => 'index'));?></li>
    </ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
