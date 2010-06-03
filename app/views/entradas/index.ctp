<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Entradas</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
    <?php echo $html->link('Inserir Entrada', array('action' => 'add'), array('class' => 'btn_azul floatRight')); ?>
</div>

<?php $session->flash(); ?>

<div class="entradas index">

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
            <th class="w5 txtCenter"><?php echo $paginator->sort('id');?></th>
            <th class="w50"><?php echo $paginator->sort('Brinde','Brinde.name');?></th>
            <th class="w10 txtCenter"><?php echo $paginator->sort('Quantidade', 'qtd');?></th>
            <th class="w15 txtCenter"><?php echo $paginator->sort('created');?></th>
            <th class="w5 actions">&nbsp;</th>
        </tr>
        <?php
        $i = 0;
        foreach ($entradas as $entrada):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td class="txtCenter">
                    <?php echo $entrada['Entrada']['id']; ?>
            </td>
            <td>
                    <?php echo $entrada['Brinde']['name']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $entrada['Entrada']['qtd']; ?>
            </td>
            <td class="txtCenter">
					<?php echo date('d/m/Y H:i:s', strtotime($entrada['Entrada']['created']) ); ?>
            </td>
            <td class="actions">
                    <?php echo $html->image("ico_view.gif", array(
                    "alt" => "Visualizar",
                    'url' => array('action' => 'view', $entrada['Entrada']['id'])
                    )); ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th class="txtCenter">Total</th>
            <th class="txtCenter"><?php echo $totais['qtd_entradas_total'];?></th>
            <th class="txtCenter"><?php echo $totais['quantidade_total'];?></th>
            <th class="txtCenter">&nbsp;</th>
            <th class="actions">&nbsp;</th>
        </tr>
    </table>

    <!-- .paginacao -->
    <div class="paginacao">
        <div class="pagin_proximo"><?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?></div>
        <div class="pagin_numeros"><?php echo $paginator->numbers(array('before'=>'','after'=>'','tag'=>'li','separator'=>' '));?></div>
        <div class="pagin_anterior"><?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></div>
    </div>
</div>
