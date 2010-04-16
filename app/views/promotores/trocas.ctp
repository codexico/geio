<?php
//debug($relatorio);
?>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Trocas do Promotor</h1>
</div>
<div class="clear"></div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>

<div class="trocas index">


    <?php
    //echo $this->element('trocas_relatorio');
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
            <th class="w15"><?php echo $paginator->sort('Data', 'created', array('url' =>  array( 'action'=>'trocas/'.$promotor['Promotor']['id']) ));?></th>
            <th class="w5 txtCenter"><?php echo $paginator->sort('Troca','id', array('url' =>  array( 'action'=>'trocas/'.$promotor['Promotor']['id']) ));?></th>
            <th class="w30"><?php echo $paginator->sort('consumidor','Consumidor.nome', array('url' =>  array( 'action'=>'trocas/'.$promotor['Promotor']['id']) ));?></th>
            <th class="w15 txtCenter"><?php echo $paginator->sort('Valor (R$)', 'valor_total', array('url' =>  array( 'action'=>'trocas/'.$promotor['Promotor']['id']) ));?></th>
            <th class="w20 txtCenter"><?php echo $paginator->sort('Cupons Promocionais','qtd_cp', array('url' =>  array( 'action'=>'trocas/'.$promotor['Promotor']['id']) ));?></th>
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
                    <?php echo date('d/m/Y - H:i', strtotime($troca['Troca']['created']) ); ?>
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