<?php
//debug($trocas[0]);
?>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Trocas</h1>
</div>
<div class="clear"></div>

<!-- .botoes
<div class="botoes">
<?php echo $html->link('Inserir Troca', array('action' => 'add'), array('class' => 'btn_azul floatRight')); ?>
</div>
-->
<?php $session->flash(); ?>


<div class="trocas index">
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
            <th class="w20"><?php echo $paginator->sort('Promotor','Promotor.nome');?></th>
            <th class="w20"><?php echo $paginator->sort('Consumidor','Consumidor.nome');?></th>
            <th class="w5 txtCenter"><?php echo $paginator->sort('Cupons Fiscais','qtd_cf');?></th>
            <th class="w5 txtCenter"><?php echo $paginator->sort('Cupons Promo','qtd_cp');?></th>
            <th class="w10 txtCenter"><?php echo $paginator->sort('Valor Total (R$)','valor_total');?></th>
            <th class="w10 txtCenter"><?php echo $paginator->sort('Valor Bandeira (R$)','valor_bandeira');?></th>
            <th class="w10 txtCenter"><?php echo $paginator->sort('Valor Outros (R$)','valor_outros');?></th>
            <th class="w15 txtCenter"><?php echo $paginator->sort('created');?></th>
            <th class="w5 actions"></th>
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
                    <?php echo $html->link($troca['Promotor']['nome'], array('action' => 'view', 'controller' =>'promotores', $troca['Promotor']['id'])); ?>
            </td>
            <td>
                    <?php echo $html->link($troca['Consumidor']['nome'], array('action' => 'view', 'controller' =>'consumidores', $troca['Consumidor']['id'])); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $troca['Troca']['qtd_cf']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $troca['Troca']['qtd_cp']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($troca['Troca']['valor_total'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($troca['Troca']['valor_bandeira'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($troca['Troca']['valor_outros'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
            <td class="txtCenter">
                    <?php echo date('d/m/Y - H:i', strtotime($troca['Troca']['created']) ); ?>
            </td>
            <td class="actions">

                    <?php echo $html->image("ico_view.gif", array(
                    "alt" => "Visualizar",
                    'url' => array('action' => 'view', $troca['Troca']['id'])
                    )); ?>

                    <?php /* echo $html->image("ico_edit.gif", array(
					"alt" => "Editar",
					'url' => array('action' => 'edit', $troca['Troca']['id'])
				)); */ ?>

                    <?php /* echo $html->image("ico_delete.gif", array(
					"alt" => "Excluir",
					'url' => array('action' => 'delete', $troca['Troca']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $troca['Troca']['id'])
				)); */ ?>

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
