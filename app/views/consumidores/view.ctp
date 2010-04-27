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
    <h1>Visualizar Consumidor</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
    <?php echo $html->link('Voltar', '/consumidores', array('class'=>'btn_cinza floatRight')); ?>
    <?php echo $html->link('Excluir Consumidor', array('action' => 'delete', $consumidor['Consumidor']['id']), array('class' => 'btn_azul floatRight mgr5'),
            sprintf(__('Are you sure you want to delete # %s?', true), $consumidor['Consumidor']['id'])); ?>
    <?php echo $html->link('Editar Consumidor', array('action' => 'edit', $consumidor['Consumidor']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
    <?php echo $html->link('Incluir Consumidor', array('action' => 'novo'), array('class' => 'btn_azul floatRight mgr5')); ?>
</div>

<?php $session->flash(); ?>

<div class="consumidores view">
    <dl>
        <?php $i = 0;
        $class = ' class="altrow"';?>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['id']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['nome']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RG'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['rg']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CPF'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['cpf']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('E-mail'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['email']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Celular'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['cel']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefone'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['tel']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sexo'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['sexo']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nascimento'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo date('d/m/Y', strtotime($consumidor['Consumidor']['nascimento']) ); ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado Civil'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['estado_civil']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grau de Instrução'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['grau_de_instrucao']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Profissão'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['profissao']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Observação'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['obs']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CEP'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['cep']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Endereço'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['endereco']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Número'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['numero']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Complemento'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['complemento']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bairro'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['bairro']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cidade'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['cidade']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['estado']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('País'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['pais']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo date('d/m/Y - H:i', strtotime($consumidor['Consumidor']['created'])); ?>
                &nbsp;
            </dd>
        </div>
        <?php if($consumidor['Consumidor']['deleted']) : ?>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deletado em:'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo date('d/m/Y - H:i', strtotime($consumidor['Consumidor']['deleted_date'])); ?>
                &nbsp;
            </dd>
        </div>
        <?php endif; ?>
    </dl>
</div>
<div class="clear"></div>

<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Relatório de Compras do Consumidor</h1>
</div>

<div class="relatorio">
    <p><?php echo "Total de Consumo: " . $number->currency($relatorio['total'],'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <?php if(Configure::read('Regras.Bandeira.true')) : ?>
    <p><?php echo "Total de Consumo na Bandeira: " . $number->currency($relatorio['total_bandeira'],'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <p><?php echo "Total de Consumo em outras formas: " . $number->currency($relatorio['total_outros'],'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <?php endif; ?>
    <br />
    <p><?php echo "Número de Cupons Fiscais trocados: " . $relatorio['total_cf']; ?></p>
    <p><?php echo "Média de valor de Cupom Fiscal: " . $number->currency(($relatorio['media_cf']),'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <br />
    <p><?php echo "Número de trocas efetuadas: " . $relatorio['total_trocas']; ?></p>
    <p><?php echo "Média de valor por troca: " . $number->currency(($relatorio['troca_media']),'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <p><?php echo "Média de Cupons Fiscais por troca: " . $number->format($relatorio['troca_media_qtd_cf'],array('places'=>2,'decimals'=>',','thousands'=>'.','before'=>'')); ?></p>
    <br />
    <p><?php echo "Número de Brindes: " . $relatorio['total_brindes']; ?></p>
    <p><?php echo "Número de Cupons Promocionais: " . $relatorio['total_cp']; ?></p>
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

<?php $paginator->options(array('url' => $this->passedArgs)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <!-- <th class="txtCenter"><?php echo $paginator->sort('id');?></th> -->
            <th class="txtCenter"><?php echo $paginator->sort('Nr. Cupom Fiscal','codigo');?></th>
            <th><?php echo $paginator->sort('Loja','Loja.nome_fantasia');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('Valor (R$)','valor');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('forma_de_pagamento');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('bandeira');?></th>
            <th class="txtCenter"><?php echo $paginator->sort('created');?></th>
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
                    <?php echo $cupomFiscal['Loja']['nome_fantasia']; ?>
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
</div>
