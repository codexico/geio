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
        <?php if( Configure::read('Regras.Brinde.true') ) : ?>
        <br />
        <p class="message">
            <?php if($brindesDisponiveis > 0) : ?>
            O Consumidor ainda pode receber <?php echo $brindesDisponiveis ?> brindes.
            <?php else : ?>
            O Consumidor não pode mais receber brindes.
            <?php endif; ?>
        </p>
        <br />
        <?php endif; ?>
    <?php
    echo $form->create('Troca', array('action'=> 'nova/'.$consumidor['Consumidor']['id'], 'class' => "novatroca",
    //'onsubmit'=>'enviar();return false;'
    ));
    if( Configure::read('Regras.Bandeira.true') ) {
        echo $form->hidden('bandeira', array('value'=>'true', 'name'=>'bandeira', 'id'=>'bandeira' ) );
    }else {
        echo $form->hidden('bandeira', array('value'=>'false', 'name'=>'bandeira', 'id'=>'bandeira' ) );

    }
    echo $form->hidden('bandeira_nome', array('value'=>Configure::read('Regras.Bandeira.nome'), 'name'=>'bandeira_nome', 'id'=>'bandeira_nome' ) );
    echo $form->hidden('bandeira-qtd', array('value'=>Configure::read('Regras.Bandeira.valor'), 'name'=>'bandeira-qtd', 'id'=>'bandeira-qtd' ) );
    echo $form->hidden('regras-valor', array('value'=>Configure::read('Regras.Valor'), 'name'=>'regras-valor', 'id'=>'regras-valor' ) );
    echo $form->hidden('juntar_saldos', array('value'=>'true', 'name'=>'data[Troca][juntar_saldos]', 'id'=>'juntar_saldos' ) );
    if( Configure::read('Regras.Saldo.true') ) {
        echo $form->hidden('saldo_bandeira', array('value'=>$consumidor['Consumidor']['saldo_bandeira'], 'name'=>'saldo_bandeira', 'id'=>'saldo_bandeira' ) );
        echo $form->hidden('saldo_outros', array('value'=>$consumidor['Consumidor']['saldo_outros'], 'name'=>'saldo_outros', 'id'=>'saldo_outros' ) );
    }else {
        echo $form->hidden('saldo', array('value'=>'false', 'name'=>'saldo', 'id'=>'saldo' ) );
    }
    if( Configure::read('Regras.Brinde.true') ) {
        echo $form->hidden('brinde', array('value'=>'true', 'name'=>'brinde', 'id'=>'brinde' ) );
        echo $form->hidden('brinde_preco', array('value'=>Configure::read('Regras.Brinde.preco'), 'name'=>'brinde_preco', 'id'=>'brinde_preco' ) );
        echo $form->hidden('brinde_max', array('value'=>Configure::read('Regras.Brinde.max'), 'name'=>'brinde_max', 'id'=>'brinde_max' ) );
        echo $form->hidden('brindesDisponiveis', array('value'=>$brindesDisponiveis, 'name'=>'brindesDisponiveis', 'id'=>'brindesDisponiveis' ) );
    }else {
        echo $form->hidden('brinde', array('value'=>'false', 'name'=>'brinde', 'id'=>'brinde' ) );
    }
    ?>
    <fieldset>
        <legend><?php __('Nova Troca do Consumidor');?></legend>
        <ul id="cupons" class="mgt20 mgb20">
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

    <div class="submit_botoes mgl10">
        <input id="acrescentar-cupom" class="submit" type="button" value="Acrescentar Cupom Fiscal" />
    </div>
    <div class="submit_botoes">
        <?php if( Configure::read('Regras.Brinde.true') ) : ?>
        <input id="calcular-troca" class="submit mgl20" type="button" value="Calcular Brindes" />
        <?php else : ?>
        <input id="calcular-troca" class="submit" type="button" value="Calcular Cupons Promocionais" />
        <?php endif; ?>
    </div>
    <?php echo $form->end(array('label'=>'SALVAR','class'=>'submit', 'div'=>'submit submit_botoes'));?>
    <div class="clear"></div>
</div>