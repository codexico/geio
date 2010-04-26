<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
/* @var $cakePtbr CakePtbr.FormatacaoHelper */
/* @var $paginator PaginatorHelper */
?>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Resumos Di&aacute;rios</h1>
</div>
<div class="clear"></div>

<div class="resumoDiarios index">

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
            <?php /*<th><?php echo $paginator->sort('id');?></th> */?>
            <th class="txtCenter"><?php echo $paginator->sort('Data','dia');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Consumidores Atendidos','qtd_consumidores');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Consumidores Novos','qtd_consumidores_novos');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Cupons Fiscais Trocados','qtd_cupons_fiscais');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Cupons Promocionais Impressos','qtd_cupons_promocionais');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('R$','valor_total');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('R$ Bandeira','valor_bandeira');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('R$ Outros','valor_outros');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('ticket_medio_consumidor');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Ticket Médio Shopping','ticket_medio_cupom_fiscal');?></th>
        </tr>
        <?php
        $qtd_consumidores_sum = 0;
        $qtd_consumidores_novos_sum = 0;
        $qtd_cupons_fiscais_sum = 0;
        $qtd_cupons_promocionais_sum = 0;
        $valor_total_sum = 0;
        $valor_bandeira_sum = 0;
        $valor_outros_sum = 0;
        $ticket_medio_consumidor_sum = 0;
        $ticket_medio_cupom_fiscal_sum = 0;
        $i = 0;
        foreach ($resumoDiarios as $resumoDiario):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td class="txtCenter">
                    <?php echo $html->link(date('d/m/Y', strtotime($resumoDiario['ResumoDiario']['dia'])) , array('controller' => 'relatorios', 'action' => 'detalhe_dia',$resumoDiario['ResumoDiario']['dia'])); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $resumoDiario['ResumoDiario']['qtd_consumidores']; ?>
                    <?php $qtd_consumidores_sum += $resumoDiario['ResumoDiario']['qtd_consumidores']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $resumoDiario['ResumoDiario']['qtd_consumidores_novos']; ?>
                    <?php $qtd_consumidores_novos_sum += $resumoDiario['ResumoDiario']['qtd_consumidores_novos']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $resumoDiario['ResumoDiario']['qtd_cupons_fiscais']; ?>
                    <?php $qtd_cupons_fiscais_sum += $resumoDiario['ResumoDiario']['qtd_cupons_fiscais']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $resumoDiario['ResumoDiario']['qtd_cupons_promocionais']; ?>
                    <?php $qtd_cupons_promocionais_sum += $resumoDiario['ResumoDiario']['qtd_cupons_promocionais']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo  $number->currency($resumoDiario['ResumoDiario']['valor_total'],'EUR',array('before'=>'','after'=>'')); ?>
                    <?php $valor_total_sum += $resumoDiario['ResumoDiario']['valor_total']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo  $number->currency($resumoDiario['ResumoDiario']['valor_bandeira'],'EUR',array('before'=>'','after'=>'')); ?>
                    <?php $valor_bandeira_sum += $resumoDiario['ResumoDiario']['valor_bandeira']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo  $number->currency($resumoDiario['ResumoDiario']['valor_outros'],'EUR',array('before'=>'','after'=>'')); ?>
                    <?php $valor_outros_sum += $resumoDiario['ResumoDiario']['valor_outros']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($resumoDiario['ResumoDiario']['ticket_medio_consumidor'],'EUR',array('before'=>'','after'=>'')); ?>
                    <?php $ticket_medio_consumidor_sum += $resumoDiario['ResumoDiario']['ticket_medio_consumidor']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($resumoDiario['ResumoDiario']['ticket_medio_cupom_fiscal'],'EUR',array('before'=>'','after'=>'')); ?>
                    <?php $ticket_medio_cupom_fiscal_sum += $resumoDiario['ResumoDiario']['ticket_medio_cupom_fiscal']; ?>
            </td>
        </tr>
        <?php endforeach; ?>

        <tr>
            <th>
                <?php echo "TOTAL"; ?>
            </th>
            <th class="txtCenter">
                <?php /* echo $qtd_consumidores_sum; */ ?>
                <?php echo $totais[0]['qtd_consumidores_total']; ?>
            </th>
            <th class="txtCenter">
                <?php /* echo $qtd_consumidores_novos_sum; */ ?>
                <?php echo $totais[0]['qtd_consumidores_novos_total']; ?>
            </th>
            <th class="txtCenter">
                <?php /* echo $qtd_cupons_fiscais_sum; */ ?>
                <?php echo $totais[0]['qtd_cupons_fiscais_total']; ?>
            </th>
            <th class="txtCenter">
                <?php /* echo $qtd_cupons_promocionais_sum; */ ?>
                <?php echo $totais[0]['qtd_cupons_promocionais_total']; ?>
            </th>
            <th class="txtCenter">
                <?php /* echo $valor_total_sum; */ ?>
                <?php echo $number->currency($totais[0]['valor_total_total'],'EUR',array('before'=>'','after'=>'')); ?>
            </th>
            <th class="txtCenter">
                <?php /* echo $valor_bandeira_sum; */ ?>
                <?php echo $number->currency($totais[0]['valor_bandeira_total'],'EUR',array('before'=>'','after'=>'')); ?>
            </th>
            <th class="txtCenter">
                <?php /* echo $valor_outros_sum; */ ?>
                <?php echo $number->currency($totais[0]['valor_outros_total'],'EUR',array('before'=>'','after'=>'')); ?>
            </th>
            <th class="txtCenter">
                <?php /* echo $number->currency($ticket_medio_consumidor_sum/$i,'EUR',array('before'=>'','after'=>'')); */ ?>
                <?php echo $number->currency($totais[0]['valor_total_total']/$totais[0]['qtd_consumidores_total'],'EUR',array('before'=>'','after'=>'')); ?>
            </th>
            <th class="txtCenter">
                <?php /* echo $number->currency($ticket_medio_cupom_fiscal_sum/$i,'EUR',array('before'=>'','after'=>'')); */ ?>
                <?php echo $number->currency($totais[0]['valor_total_total']/$totais[0]['qtd_cupons_fiscais_total'],'EUR',array('before'=>'','after'=>'')); ?>
            </th>
        </tr>
    </table>

    <!-- .paginacao -->
    <div class="paginacao">
        <div class="pagin_proximo"><?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?></div>
        <div class="pagin_numeros"><?php echo $paginator->numbers(array('before'=>'','after'=>'','tag'=>'li','separator'=>' '));?></div>
        <div class="pagin_anterior"><?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></div>
    </div>

</div>