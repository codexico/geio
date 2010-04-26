<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
$javascript->link(array('consumidores_index'), false);//usa jquery
?>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Consumidores</h1>
</div>
<div class="clear"></div>

<?php /*
<div class="botoes">
	<?php echo $html->link('Inserir Consumidor', array('action' => 'add'), array('class' => 'btn_azul floatRight')); ?>
</div>
*/ ?>

<?php $session->flash(); ?>
<?php /*
<div class="consumidores form">
    <fieldset>
        <legend><?php __('Pesquisar por RG');?></legend>
        <?php
        echo $form->input('rg', array('label' => 'RG', 'div' => 'input text mgt20'));
        echo $form->button('PESQUISAR', array('id' => 'pesquisarrg','class'=>'submit'));
        ?>
    </fieldset>
</div>
*/ ?>
<form><!-- criar estilo para o botao abaixo para nao precisar desse <form> -->
    <?php echo $form->button('Procurar', array('id' => 'mostraProcurar','class'=>'submit')); ?>
</form>
<div class="consumidores form mgt20" id="procurar">
    <fieldset>
        <legend><?php __('Pesquisar por CPF');?></legend>
        <?php
        echo $form->input('cpf', array('label' => 'CPF (somente números)', 'div' => 'input text mgt20'));
        echo $form->button('PESQUISAR', array('id' => 'pesquisarcpf','class'=>'submit'));
        ?>
    </fieldset>
    <br />
    <div id="consumidorencontrado">
        <?php /* view/elements/consumidorencontrado */?>
    </div>
</div>
<div class="clear"></div>
<br />
<div class="clear"></div>

<div class="consumidores index">

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
            <th class="w10 txtCenter"><?php echo $paginator->sort('cpf');?></th>
            <th class="w35"><?php echo $paginator->sort('E-mail','email');?></th>
            <th class="w10 actions"></th>
        </tr>

        <?php
        $i = 0;
        foreach ($consumidores as $consumidor):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td class="txtCenter">
                    <?php echo $consumidor['Consumidor']['id']; ?>
            </td>
            <td>
                    <?php echo $consumidor['Consumidor']['nome']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $consumidor['Consumidor']['cpf']; ?>
            </td>
            <td>
                    <?php echo $consumidor['Consumidor']['email']; ?>
            </td>
            <td class="actions">

                    <?php echo $html->image("ico_view.gif", array(
                    "alt" => "Visualizar",
                    'url' => array('action' => 'view', $consumidor['Consumidor']['id'])
                    )); ?>

                    <?php echo $html->image("ico_edit.gif", array(
                    "alt" => "Editar",
                    'url' => array('action' => 'edit', $consumidor['Consumidor']['id'])
                    )); ?>

                    <?php echo $html->link(
                    $html->image("ico_delete.gif", array("alt" => "Excluir")),
                    array('action' => 'delete', $consumidor['Consumidor']['id']),
                    null,
                    sprintf(__('Tem certeza que quer deletar #%s - %s?', true),
                    $consumidor['Consumidor']['id'], $consumidor['Consumidor']['nome']),null
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