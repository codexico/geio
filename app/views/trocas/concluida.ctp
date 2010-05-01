<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
//debug($troca);
?>
<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Dados da Troca</h1>
</div>
<div class="clear"></div>
<div class="botoes">
<?php
if( Configure::read('Regras.Brinde.true') ) {
    echo "Consumidor ganhou ".$troca['Troca']['qtd_premios']." brindes.";
}else{
    echo $html->link('Gerar Cupons Promocionais', array('controller'=>'CupomPromocionais', 'action' => 'cupomPdf',$troca['Troca']['id']), array('class'=>'btn_azul'));
}
?>
</div>
<div class="trocas view">

    <dl><?php $i = 0;
        $class = ' class="altrow"';?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valor Total'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo "R$ " . $troca['Troca']['valor_total']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('N° Cupons Promocionais'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $troca['Troca']['qtd_cp']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('N° Cupons Fiscais'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $troca['Troca']['qtd_cf']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Promotor'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $troca['Promotor']['nome']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Consumidor'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $troca['Consumidor']['nome']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $troca['Troca']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo date('d/m/Y H:i:s', strtotime($troca['Troca']['created']) ); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="clear"></div>
<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Dados do Consumidor</h1>
</div>
<div class="clear"></div>
<?php
echo $this->element('consumidor');
?>
<br />
<br />