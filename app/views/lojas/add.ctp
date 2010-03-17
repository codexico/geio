<div class="lojas form">
    <?php echo $form->create('Loja');?>
    <fieldset>
        <legend><?php __('Add Loja');?></legend>
        <?php
        echo $form->input('razao_social');
        echo $form->input('nome_fantasia');
        echo $form->input('participante');
        echo $form->input('cnpj', array('label' => 'CNPJ (formato XX.XXX.XXX/XXXX-XX)'));
        echo $form->input('numero_da_loja');
        //echo $form->input('ramo_de_atividade');

        echo $form->input('ramo_de_atividade', array('options' => array(
                'Calçado'=>'Calçado',
                'Alimentação'=>'Alimentação',
                'Confecção'=>'Confecção',
                'Eletrônicos'=>'Eletrônicos',
                'Brinquedos'=>'Brinquedos',
                'Beleza e Higiene Pessoal'=>'Beleza e Higiene Pessoal',
                'Cosméticos'=>'Cosméticos',
                'Saúde'=>'Saúde',
                'Serviços'=>'Serviços',
                'outro'=>'outro'
        ),
        'selected'=>'',
        'empty' => true));
        echo $form->input('contato');
        echo $form->input('email_contato');
        echo $form->input('telefone');
        ?>
    </fieldset>
    <?php echo $form->end('Submit');?>
</div>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('List Lojas', true), array('action' => 'index'));?></li>
    </ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
