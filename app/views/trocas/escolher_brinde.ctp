<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
//debug($troca);
$javascript->link(array('jquery-1.4.2.min'), false);// false para ir em <head>
$javascript->link(array('trocas_escolher_brinde'), false);
?>
<?php
if( Configure::read('Regras.Brinde.true') ) {
    echo "Escolher ".$troca['Troca']['qtd_premios']." brindes para o Consumidor.";
    echo "<br /><br />";
}else{
    echo $html->link('Gerar Cupons Promocionais', array('controller'=>'CupomPromocionais', 'action' => 'cupomPdf',$troca['Troca']['id']));
}

    echo $form->create('Troca', array('action'=> 'escolher_brinde/'.$this->params['pass'][0]));

    echo $form->hidden('qtd_brindes', array('value'=>$troca['Troca']['qtd_premios']));

//debug($brindes);
$i=0;
foreach ($brindes as $id => $brinde) {
    echo "<br />";
    echo $brinde;
    echo $form->input( 'Premio.foreign_key.'.$id, array('label'=>'Quantidade','class'=>'qtd_brinde') );
}
echo $form->end(array('value'=>'Enviar','class'=>'enviar_qtd_brindes') );
?>
<br />
<br />
<div class="trocas view">
    <h2><?php  __('Troca');?></h2>
    <dl><?php $i = 0;
        $class = ' class="altrow"';?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $troca['Troca']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Promotor Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $troca['Troca']['promotor_id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Consumidor Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $troca['Troca']['consumidor_id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo date('d/m/Y H:i:s', strtotime($troca['Troca']['created']) ); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valor Total'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo "R$ " . $troca['Troca']['valor_total']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('N° Cupons Fiscais'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $troca['Troca']['qtd_cf']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('N° Cupons Promocionais'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $troca['Troca']['qtd_cp']; ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php
echo $this->element('consumidor');
?>