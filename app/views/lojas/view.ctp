<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
/* @var $cakePtbr CakePtbr.FormatacaoHelper */
/* @var $paginator PaginatorHelper */
/* @var $number NumberHelper */
?>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Visualizar Loja</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">

    <?php echo $html->link('Voltar', '/lojas', array('class'=>'btn_cinza floatRight')); ?>
    <?php echo $html->link('Excluir Loja', array('action' => 'delete', $loja['Loja']['id']), array('class' => 'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $loja['Loja']['id'])); ?>
    <?php echo $html->link('Editar Loja', array('action' => 'edit', $loja['Loja']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
    <?php echo $html->link('Incluir Loja', array('action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="lojas view">

    <dl>
        <?php $i = 0;
        $class = ' class="altrow"';?>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $loja['Loja']['id']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Raz&atilde;o Social'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $loja['Loja']['razao_social']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome Fantasia'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $loja['Loja']['nome_fantasia']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Participante'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php if($loja['Loja']['participante']) {
                    echo "SIM";
                }else {
                    echo "NÂO";
                } ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CNPJ'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $loja['Loja']['cnpj']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero da Loja'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $loja['Loja']['numero_da_loja']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ramo de Atividade'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $loja['Loja']['ramo_de_atividade']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contato'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $loja['Loja']['contato']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('E-mail do Contato'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $loja['Loja']['email_contato']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefone'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $loja['Loja']['telefone']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo date('d/m/Y - H:m',strtotime($loja['Loja']['created'])); ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo date('d/m/Y - H:m',strtotime($loja['Loja']['modified'])); ?>
                &nbsp;
            </dd>
        </div>
    </dl>
</div>
<div class="clear"></div>

<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Relatório de Compras na Loja</h1>
</div>
<div class="relatorio">
    <p><?php echo "Total de Consumo: " . $number->currency($relatorio['total'],'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <p><?php echo "Número Total de Consumidores: " . $relatorio['total_consumidores']; ?></p>
    <br />

    <?php if(Configure::read('Regras.Bandeira.true')) : ?>
    <p><?php echo "Total de Consumo na Bandeira: " . $number->currency($relatorio['total_bandeira'],'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <p><?php echo "Número de Consumidores que usaram a Bandeira: " . $relatorio['total_consumidores_bandeira']; ?></p>
    <br />
    <p><?php echo "Total de Consumo em outras formas: " . $number->currency($relatorio['total_outros'],'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <p><?php echo "Número de Consumidores que Não usaram a Bandeira: " . $relatorio['total_consumidores_outros']; ?></p>
    <?php endif; ?>
</div>
<div class="clear"></div>

<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Cupons Fiscais</h1>
</div>
<div class="clear"></div>

<div class="cupomFiscais index">

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
            <!-- <th class="txtCenter"><?php echo $paginator->sort('id',null, array('url' =>  array( 'action'=>'view/'.$loja['Loja']['id']) ) );?></th> -->
            <th class="txtCenter"><?php echo $paginator->sort('Nr. Cupom Fiscal','codigo', array('url' =>  array( 'action'=>'view/'.$loja['Loja']['id']) ) );?></th>
            <th><?php echo $paginator->sort('Consumidor','Consumidor.nome', array('url' =>  array( 'action'=>'view/'.$loja['Loja']['id']) ) );?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Valor (R$)','valor', array('url' =>  array( 'action'=>'view/'.$loja['Loja']['id']) ) );?></th>
            <th class="txtCenter"><?php echo $paginator->sort('forma_de_pagamento',null, array('url' =>  array( 'action'=>'view/'.$loja['Loja']['id']) ) );?></th>
            <th class="txtCenter"><?php echo $paginator->sort('bandeira',null, array('url' =>  array( 'action'=>'view/'.$loja['Loja']['id']) ) );?></th>
            <th class="txtCenter"><?php echo $paginator->sort('created',null, array('url' =>  array( 'action'=>'view/'.$loja['Loja']['id']) ) );?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($cupomFiscais as $cupomFiscal):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td class="txtCenter">
                    <?php echo $html->link($cupomFiscal['CupomFiscal']['codigo'], array('controller' => 'cupom_fiscais', 'action' => 'view', $cupomFiscal['CupomFiscal']['id'])); ?>
            </td>
            <td>
                    <?php echo $cupomFiscal['Consumidor']['nome']; ?>
            </td>
            <td class="txtCenter">
                    <?php echo $number->currency($cupomFiscal['CupomFiscal']['valor'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
            <td class="txtCenter">
                    <?php echo $cupomFiscal['CupomFiscal']['forma_de_pagamento']; ?>
            </td>
            <td class="txtCenter">
                <?php echo ($cupomFiscal['CupomFiscal']['bandeira']=='') ? 'Cash' : $cupomFiscal['CupomFiscal']['bandeira'] ; ?>
            </td>
            <td class="txtCenter">
                    <?php echo date('d/m/Y - H:m',strtotime($cupomFiscal['CupomFiscal']['created'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- .paginacao -->
    <div class="paginacao">

        <div class="pagin_proximo"><?php echo $paginacao->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?></div>
        <div class="pagin_numeros"><?php echo $paginacao->numbers(array('before'=>'','after'=>'','tag'=>'li','separator'=>' '));?></div>
        <div class="pagin_anterior"><?php echo $paginacao->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></div>
    </div>
<?php /* debug($this->passedArgs[0]); */ ?>
</div>
