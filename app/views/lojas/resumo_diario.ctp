<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
/* @var $cakePtbr CakePtbr.FormatacaoHelper */
/* @var $paginator PaginatorHelper */
//debug($resumoDiarios[0]);
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
            <th class="txtCenter"><?php
                echo $html->link(__('Data', true), array(
                'sort' => 'dmy',
                'page' => isset($this->passedArgs['page'])?$this->passedArgs['page']:1,
                'direction' => isset($this->passedArgs['direction'])? ($this->passedArgs['direction'] == 'asc')?'desc' : 'asc' : 'asc'
                ));
                ?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Loja','Loja.nome_fantasia');?></th>
            <th class="txtCenter">
                <?php
                echo $html->link(__('Cupons Fiscais Trocados', true), array(
                'page' => isset($this->passedArgs['page'])?$this->passedArgs['page']:1,
                'sort' => 'sum_cf',
                'limit' => isset($this->passedArgs['limit'])?$this->passedArgs['limit']:'',
                'direction' => isset($this->passedArgs['direction'])? ($this->passedArgs['direction'] == 'asc')?'desc' : 'asc' : 'asc'
                ));
                ?>
            </th>
            <th class="txtCenter">
                <?php
                echo $html->link(__('VENDAS DIA (R$)', true), array(
                'sort' => 'sum_valor',
                'page' => isset($this->passedArgs['page'])?$this->passedArgs['page']:1,
                'direction' => isset($this->passedArgs['direction'])? ($this->passedArgs['direction'] == 'asc')?'desc' : 'asc' : 'asc'
                ));
                ?></th>
            <th class="txtCenter">
                <?php
                //echo $paginator->sort('Venda Média','avg_valor');
                echo $html->link(__('Venda Média (R$)', true), array(
                'page' => isset($this->passedArgs['page'])?$this->passedArgs['page']:1,
                'sort' => 'avg_valor',
                'direction' => isset($this->passedArgs['direction'])? ($this->passedArgs['direction'] == 'asc')?'desc' : 'asc' : 'asc'
                ));
                ?></th>
        </tr>
        <?php
        //debug($resumoDiarios);
        $i = 0;
        foreach ($resumoDiarios as $resumoDiario):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td class="txtCenter">
                    <?php /* echo date('d/m/Y',strtotime($resumoDiario['CupomFiscal']['data_compra'])); */ ?>
                    <?php echo date('d/m/Y',strtotime($resumoDiario['CupomFiscal']['dmy'])); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $html->link($resumoDiario['Loja']['nome_fantasia'] , array('controller' => 'lojas', 'action' => 'view',$resumoDiario['CupomFiscal']['loja_id'])); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $resumoDiario['CupomFiscal']['sum_cf']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($resumoDiario['CupomFiscal']['sum_valor'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($resumoDiario['CupomFiscal']['avg_valor'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
        </tr>
        <?php endforeach; ?>

        <tr>
            <th class="txtCenter">
                <?php echo "TOTAL"; ?>
            </th>
            <th class="txtCenter">
            </th>
            <th class="txtCenter">
                <?php echo $totais['CupomFiscal']['sum_cf']; ?>
            </th>
            <th class="txtCenter">
                <?php echo $number->currency($totais['CupomFiscal']['sum_valor'],'EUR',array('before'=>'','after'=>'')); ?>
            </th>
            <th class="txtCenter">
                <?php echo $number->currency($totais['CupomFiscal']['avg_valor'],'EUR',array('before'=>'','after'=>'')); ?>
            </th>
        </tr>
    </table>

    <!-- .paginacao -->
    <div class="paginacao">
        <div class="pagin_proximo"><?php echo $paginator->next(__('next', true).' >>', array('model'=>'CupomFiscal'), null, array('class' => 'disabled'));?></div>
        <div class="pagin_numeros"><?php echo $paginator->numbers(array('before'=>'','after'=>'','tag'=>'li','separator'=>' '));?></div>
        <div class="pagin_anterior"><?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></div>
    </div>

</div>