<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Brindes</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
    <?php echo $html->link('Inserir Brinde', array('action' => 'add'), array('class' => 'btn_azul floatRight mg5')); ?>
    <?php if($brindes) echo $html->link('Inserir Entrada', array('controller'=>'entradas','action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
</div>

<?php $session->flash(); ?>

<div class="brindes index">

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
            <th class="w25"><?php echo $paginator->sort('Nome', 'name');?></th>
            <!-- Será usado qd tiver controle de premiacao para cada tipo de brinde
            <th class="w10 txtCenter"><?php echo $paginator->sort('valor');?></th>
            <th class="w20 txtCenter"><?php echo $paginator->sort('Max. Consumidores', 'consumidor_max');?></th>
            -->
            <th class="w15 txtCenter"><?php echo $paginator->sort('estoque_atual');?></th>
            <th class="w10 actions"></th>
        </tr>
        <?php
        $i = 0;
        foreach ($brindes as $brinde):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td class="txtCenter">
                    <?php echo $brinde['Brinde']['id']; ?>
            </td>
            <td>
                    <?php echo $brinde['Brinde']['name']; ?>
            </td>
            <!-- Será usado qd tiver controle de premiacao para cada tipo de brinde
                    <td class="txtCenter">
                <?php echo $brinde['Brinde']['valor']; ?>
			</td>
                    <td class="txtCenter">
                <?php echo $brinde['Brinde']['consumidor_max']; ?>
			</td>
            -->
            <td class="txtCenter">
                    <?php echo $brinde['Brinde']['estoque_atual']; ?>
            </td>
            <td class="actions">

                    <?php echo $html->image("ico_view.gif", array(
                    "alt" => "Visualizar",
                    'url' => array('action' => 'view', $brinde['Brinde']['id'])
                    )); ?>

                    <?php echo $html->image("ico_edit.gif", array(
                    "alt" => "Editar",
                    'url' => array('action' => 'edit', $brinde['Brinde']['id'])
                    )); ?>
    
                    <?php echo $html->link(
                    $html->image("ico_delete.gif", array("alt" => "Excluir")),
                    array('action' => 'delete', $brinde['Brinde']['id']),
                    null,
                    sprintf(__('Tem certeza que quer deletar #%s - %s?', true),
                    $brinde['Brinde']['id'], $brinde['Brinde']['name']),null
                    ); ?>

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