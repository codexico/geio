<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
/* @var $cakePtbr CakePtbr.FormatacaoHelper */
/* @var $paginator PaginatorHelper */
//debug($detalhes);
;?>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Detalhe Dia <?=date('d/m/Y', strtotime($dia));?></h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', 'javascript:history.back(-1)', array('class' => 'btn_cinza floatRight')); ?>
</div>

<div class="relatorios detalhe_dia index">

    <!-- .pagina_atual -->
    <div class="pagina_atual">
        <div class="pagina_atual_conteudo">
            <p>
                <?php
                echo $paginator->counter(array(
                'format' => __('P&aacute;gina %page% de %pages%', true)
                ));
                ?>
            </p>
        </div>
    </div>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $paginator->sort('Consumidor','consumidor_nome', array('url' =>  array( 'action'=>'detalhe_dia/'.$dia) ) );?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Cupons Fiscais Trocados','qtd_cf', array('url' =>  array( 'action'=>'detalhe_dia/'.$dia) ) );?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Cupons Promocionais Impressos','qtd_cp', array('url' =>  array( 'action'=>'detalhe_dia/'.$dia) ) );?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Média de Consumo','valor_total', array('url' =>  array( 'action'=>'detalhe_dia/'.$dia) ) );?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Consumo Total (R$)','valor_total', array('url' =>  array( 'action'=>'detalhe_dia/'.$dia) ) );?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Consumo Bandeira (R$)','valor_bandeira', array('url' =>  array( 'action'=>'detalhe_dia/'.$dia) ) );?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Consumo Outros (R$)','valor_outros', array('url' =>  array( 'action'=>'detalhe_dia/'.$dia) ) );?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($detalhes as $detalhe):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td>
                    <?php echo $html->link($detalhe['TrocasDia']['consumidor_nome'], array('action' => 'view', 'controller' =>'consumidores', $dia)); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $detalhe['TrocasDia']['sum_cf']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $detalhe['TrocasDia']['sum_cp']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($detalhe['TrocasDia']['avg_valor_total'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($detalhe['TrocasDia']['sum_valor_total'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
            <td>
                    <?php echo $number->currency($detalhe['TrocasDia']['sum_bandeira'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($detalhe['TrocasDia']['sum_outros'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- .paginacao -->
    <div class="paginacao">
        <div class="pagin_proximo"><?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?></div>
        <div class="pagin_numeros"><?php echo $paginator->numbers(array('before'=>'','after'=>'','tag'=>'li','separator'=>' '));?></div>
        <div class="pagin_anterior"><?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></div>
    </div>

</div>