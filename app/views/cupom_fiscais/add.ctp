<div class="cupomFiscais form">
<?php echo $form->create('CupomFiscal');?>
     <fieldset>
        <legend><?php __('Add CupomFiscal');?></legend>
        <?php
        echo $form->input('codigo');
        //echo $form->input('data_compra');
        echo $form->input('data_compra', array(
        'dateFormat'=>'DMY',
        'timeFormat'=>'24',
        'minYear'=> date('Y'),
        'maxYear' => date('Y'),
        'selected'=> strtotime("now -3 hours")//quanto tempo a pessoa demora para ir trocar o cupom fiscal, 3 horas?
        )
        );
        echo $form->input('troca_id');
        echo $form->input('loja_id');
        echo $form->input('valor');
        //echo $form->input('forma_de_pagamento');
        echo $form->input('forma_de_pagamento', array('options' => array(
                'Dinheiro'=>'Dinheiro',
                'Débito'=>'Débito',
                'Crédito'=>'Crédito'
        )));
        //echo $form->input('bandeira');
        echo $form->input('bandeira', array('options' => array(
                'VISA'=>'VISA',
                'MasterCard'=>'MasterCard',
                'HiperCard'=>'HiperCard',
                'Diners'=>'Diners',
                'Aura'=>'Aura',
                'American Express'=>'American Express',
                'outro'=>'outro'
        ),
        'selected'=>'',
        'empty' => true));
        ?>
    </fieldset>
    <?php echo $form->end('Submit');?>
</div>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('List CupomFiscais', true), array('action' => 'index'));?></li>
        <li><?php echo $html->link(__('List Trocas', true), array('controller' => 'trocas', 'action' => 'index')); ?> </li>
        <li><?php echo $html->link(__('New Troca', true), array('controller' => 'trocas', 'action' => 'add')); ?> </li>
        <li><?php echo $html->link(__('List Lojas', true), array('controller' => 'lojas', 'action' => 'index')); ?> </li>
        <li><?php echo $html->link(__('New Loja', true), array('controller' => 'lojas', 'action' => 'add')); ?> </li>
    </ul>
</div>
