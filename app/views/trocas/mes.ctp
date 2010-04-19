<?php
//debug($relatorio);
?>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Trocas dos &uacute;ltimos 30 dias</h1>
</div>
<div class="clear"></div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>

<div class="trocas index">


    <?php
    echo $this->element('trocas_relatorio');
    ?>

    <br />
    <hr />
    <br />

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
            <th class="w15"><?php echo $paginator->sort('Data', 'created');?></th>
            <th class="w5 txtCenter"><?php echo $paginator->sort('id');?></th>
            <th class="w30"><?php echo $paginator->sort('consumidor','Consumidor.nome');?></th>
            <th class="w15 txtCenter"><?php echo $paginator->sort('Valor (R$)', 'valor_total');?></th>
            <th class="w20 txtCenter"><?php echo $paginator->sort('Cupons Promocionais','qtd_cp');?></th>
            <th class="w15"><?php echo $paginator->sort('promotor','Promotor.nome');?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($trocas as $troca):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td>
                    <?php echo date('d/m/Y H:i:s', strtotime($troca['Troca']['created']) ); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $html->link($troca['Troca']['id'], array('action' => 'view/'.$troca['Troca']['id'])); ?>
            </td>
            <td>
                    <?php echo $html->link($troca['Consumidor']['nome'], array('action' => 'view', 'controller' =>'consumidores', $troca['Consumidor']['id'])); ?>
                    <?php echo $html->link('Trocas', array('action' => 'consumidor', 'controller' =>'trocas', $troca['Consumidor']['id'])); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($troca['Troca']['valor_total'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $troca['Troca']['qtd_cp']; ?>
            </td>
            <td>
                    <?php echo $html->link($troca['Promotor']['nome'], array('action' => 'view', 'controller' =>'promotores', $troca['Promotor']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>

        <tr>
            <th>
                <?php echo "TOTAL"; ?>
            </th>
            <th class="txtCenter">
                <?php echo $relatorio['count_trocas']; ?>
            </th>
            <th class="txtCenter">
                <?php echo $relatorio['num_consumidores_atendidos']; ?>
            </th>
            <th class="txtCenter">
                <?php echo $number->currency($relatorio['valor_cupons_fiscais'],'EUR',array('before'=>'','after'=>'')); ?>
            </th>
            <th class="txtCenter">
                <?php echo $relatorio['num_cupons_promocionais']; ?>
            </th>
            <th>
                <?php echo " "; ?>
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