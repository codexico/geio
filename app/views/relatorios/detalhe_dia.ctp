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
    <h1>Detalhe Dia <?=$dia?></h1>
</div>
<div class="clear"></div>
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
            <th><?php echo $paginator->sort('Consumidor','consumidor_nome');?></th>
            <th><?php echo $paginator->sort('Cupons Fiscais Trocados','sum_cf');?></th>
            <th><?php echo $paginator->sort('Cupons Promocionais Impressos','sum_cp');?></th>
            <th><?php echo $paginator->sort('Média de Consumo','avg_valor_total');?></th>
            <th><?php echo $paginator->sort('Consumo Total','sum_valor_total');?></th>
            <th><?php echo $paginator->sort('Consumo Bandeira','sum_bandeira');?></th>
            <th><?php echo $paginator->sort('Consumo Outros','sum_outros');?></th>
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
                    <?php echo $html->link($detalhe['TrocasDia']['consumidor_nome'], array('action' => 'view', 'controller' =>'consumidores', $detalhe['TrocasDia']['consumidor_id'])); ?>
            </td>
            <td>
                    <?php echo $detalhe['TrocasDia']['sum_cf']; ?>
            </td>
            <td>
                    <?php echo $detalhe['TrocasDia']['sum_cp']; ?>
            </td>
            <td>
                    <?php echo $detalhe['TrocasDia']['avg_valor_total']; ?>
            </td>
            <td>
                    <?php echo $detalhe['TrocasDia']['sum_valor_total']; ?>
            </td>
            <td>
                    <?php echo $detalhe['TrocasDia']['sum_bandeira']; ?>
            </td>
            <td>
                    <?php echo $detalhe['TrocasDia']['sum_outros']; ?>
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