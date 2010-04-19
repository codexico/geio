<?php 
//debug($promotores);
?>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Promotores</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
    <?php echo $html->link('Inserir Promotor', array('action' => 'add'), array('class' => 'btn_azul floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="promotores index">

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
            <th class="w55"><?php echo $paginator->sort('nome');?></th>
            <th class="w20"><?php echo $paginator->sort('E-mail', 'email');?></th>
            <th class="w15 txtCenter"><?php echo $paginator->sort('Login','User.username');?></th>
            <th class="w10 actions"></th>
        </tr>
        <?php
        $i = 0;
        foreach ($promotores as $promotor):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td>
                    <?php echo $html->link($promotor['Promotor']['nome'],
                    array('action' => 'trocas', 'controller' =>'promotores', $promotor['Promotor']['id'])); ?>

            </td>
            <td>
                    <?php echo $promotor['Promotor']['email']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $promotor['User']['username']; ?>
            </td>
            <td class="actions">

                    <?php echo $html->image("ico_view.gif", array(
                    "alt" => "Visualizar",
                    'url' => array('action' => 'view', $promotor['Promotor']['id'])
                    )); ?>

                    <?php echo $html->image("ico_edit.gif", array(
                    "alt" => "Editar",
                    'url' => array('action' => 'edit', $promotor['Promotor']['id'])
                    )); ?>

                    <?php echo $html->image("ico_delete.gif", array(
                    "alt" => "Excluir",
                    'url' => array('action' => 'delete', $promotor['Promotor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $promotor['Promotor']['id'])
                    )); ?>

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