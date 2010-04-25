<?php
//debug($usuarios);
?>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Usu&aacute;rios</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
    <?php echo $html->link('Inserir Usuario', array('action' => 'add'), array('class' => 'btn_azul floatRight')); ?>
</div>

<?php $session->flash(); ?>

<div class="usuarios index">

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
            <th class="w40"><?php echo $paginator->sort('nome');?></th>
            <th class="w30"><?php echo $paginator->sort('email');?></th>
            <th class="w15"><?php echo $paginator->sort('Login','User.username');?></th>
            <th class="w10 actions"></th>
        </tr>
        <?php
        $i = 0;
        foreach ($usuarios as $usuario):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td class="txtCenter">
                    <?php echo $usuario['Usuario']['id']; ?>
            </td>
            <td>
                    <?php echo $usuario['Usuario']['nome']; ?>
            </td>
            <td>
                    <?php echo $usuario['Usuario']['email']; ?>
            </td>
            <td>
                    <?php echo $usuario['User']['username']; ?>
            </td>
            <td class="actions">

                    <?php echo $html->image("ico_view.gif", array(
                    "alt" => "Visualizar",
                    'url' => array('action' => 'view', $usuario['Usuario']['id'])
                    )); ?>

                    <?php echo $html->image("ico_edit.gif", array(
                    "alt" => "Editar",
                    'url' => array('action' => 'edit', $usuario['Usuario']['id'])
                    )); ?>


                    <?php echo $html->link(
                    $html->image("ico_delete.gif", array("alt" => "Excluir")),
                    array('action' => 'delete', $usuario['Usuario']['id']), null,
                    sprintf(__('Tem certeza que quer deletar #%s - %s?', true),
                    $usuario['Usuario']['id'], $usuario['Usuario']['nome']),null
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