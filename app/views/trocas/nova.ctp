<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
$javascript->link(array('jquery-1.4.2.min'), false);// false para ir em <head>
$javascript->link(array('trocas_nova'), false);
?>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/consumidores/pesquisar', array('class'=>'btn_cinza floatRight')); ?>
</div>

<?php $session->flash(); ?>

<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Dados do Consumidor</h1>
</div>
<div class="clear"></div>

<?php
echo $this->element('consumidor');
?>
<div class="clear"></div>

<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Troca do Consumidor</h1>
</div>
<div class="clear"></div>
<div class="trocas form">
    <?php
    echo $form->create('Troca', array('action'=> 'nova/'.$consumidor['Consumidor']['id'], 'class' => "novatroca",
    //'onsubmit'=>'enviar();return false;'
    ));
    if( Configure::read('Regras.Saldo.true') ) {
        echo $form->hidden('juntar_saldos', array('value'=>'true', 'name'=>'data[Troca][juntar_saldos]', 'id'=>'juntar_saldos' ) );
        echo $form->hidden('saldo_bandeira', array('value'=>$consumidor['Consumidor']['saldo_bandeira'], 'name'=>'saldo_bandeira', 'id'=>'saldo_bandeira' ) );
        echo $form->hidden('saldo_outros', array('value'=>$consumidor['Consumidor']['saldo_outros'], 'name'=>'saldo_outros', 'id'=>'saldo_outros' ) );
    }
    ?>
    <fieldset>
        <legend><?php __('Nova Troca do Consumidor');?></legend>
        <ul id="cupons">
            <?php
            if(isset ($this->data)) {
                $i=0;
                foreach ($this->data['CupomFiscal'] as $cf) {

                    echo $this->element('form_cupom_fiscal', array('i' => $i++));
                    
                    echo $javascript->codeBlock('
                            $(document).ready(function() {
                                sincronizaSelectLoja('.$i.');
                                sincronizaSelectBandeira('.$i.');
                            })
                        ');
                }
            }else {
                echo $this->element('form_cupom_fiscal', array('i' => 0));
            }
            ?>
        </ul>
    </fieldset>
	<input id="acrescentar-cupom" class="submit" type="button" value="Acrescentar Cupom Fiscal" />

<?php if( Configure::read('Regras.Brinde.true') ) : ?>
	<input id="calcular-troca" class="submit" type="button" value="Calcular Brindes" />
<?php else : ?>
	<input id="calcular-troca" class="submit" type="button" value="Calcular Cupons Promocionais" />
<?php endif; ?>
        
    <?php echo $form->end(array('label'=>'SALVAR','class'=>'submit'));?>
</div>