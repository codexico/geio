<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
$javascript->link(array('jquery-1.4.2.min'), false);// false para ir em <head>
$javascript->link(array('trocas_nova'), false);
?>
<div class="trocas form">

    <?php $session->flash('Impressora'); ?>
    <?php
    echo $this->element('consumidor');
    ?>
    <?php
    echo $form->create('Troca', array('action'=> 'nova/'.$consumidor['Consumidor']['id'],
    'onsubmit'=>'return confirm("Confirma?")'));
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
        <input id="acrescentar-cupom" type="button" value="Acrescentar Cupom Fiscal" />
    </fieldset>
    <input id="calcular-troca" type="button" value="Calcular Cupons Promocionais" />
    <?php echo $form->end('Salvar e gerar Cupons Promocionais');?>

</div>