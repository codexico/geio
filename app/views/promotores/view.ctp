<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Visualizar Promotor</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
    <?php echo $html->link('Voltar', '/promotores', array('class'=>'btn_cinza floatRight')); ?>
    <?php echo $html->link('Excluir Promotor', array('action' => 'delete', $promotor['Promotor']['id']), array('class' => 'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $promotor['Promotor']['id'])); ?>
    <?php echo $html->link('Editar Promotor', array('action' => 'edit', $promotor['Promotor']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
    <?php echo $html->link('Incluir Promotor', array('action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
</div>

<?php $session->flash(); ?>

<div class="promotores view">

    <dl>
        <?php $i = 0;
        $class = ' class="altrow"';?>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $promotor['Promotor']['id']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $promotor['Promotor']['nome']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('E-mail'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $promotor['Promotor']['email']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RG'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $promotor['Promotor']['rg']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CPF'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $promotor['Promotor']['cpf']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id do Usu&aacute;rio'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $promotor['Promotor']['user_id']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Login'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $promotor['User']['username']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefone'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $promotor['Promotor']['tel']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Celular'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $promotor['Promotor']['cel']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Observa&ccedil;&otilde;es'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $promotor['Promotor']['obs']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo date('d/m/Y - H:i',strtotime($promotor['Promotor']['created'])); ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo date('d/m/Y - H:i',strtotime($promotor['Promotor']['modified'])); ?>
                &nbsp;
            </dd>
        </div>
        <?php if($promotor['Promotor']['deleted']) : ?>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deletado em:'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                    <?php echo date('d/m/Y - H:i', strtotime($promotor['Promotor']['deleted_date'])); ?>
                &nbsp;
            </dd>
        </div>
        <?php endif; ?>
    </dl>
</div>
<div class="clear"></div>

<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Relatório</h1>
</div>
<div class="relatorio">
    <p><?php echo "Valor Total Trocado: " . $number->currency($relatorio['total'],'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <p><?php echo "Número de trocas efetuadas: " . $relatorio['total_trocas']; ?></p>
    <p><?php echo "Média de valor por troca: " . $number->currency(($relatorio['media_total']),'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <br />
    <?php if(Configure::read('Regras.Bandeira.true')) : ?>
    <p><?php echo "Valor Total Trocado Bandeira: " . $number->currency($relatorio['total_bandeira'],'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <p><?php echo "Valor Total Trocado Outros: " . $number->currency($relatorio['total_outros'],'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <br />
    <p><?php echo "Média de valor em Bandeira por troca: " . $number->currency(($relatorio['media_bandeira']),'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <p><?php echo "Média de valor em Outros por troca: " . $number->currency(($relatorio['media_outros']),'EUR',array('before'=>'R$ ','after'=>'')); ?></p>
    <?php endif; ?>
    <br />
    <p><?php echo "Número de Cupons Fiscais trocados: " . $relatorio['total_cf']; ?></p>
    <p><?php echo "Média de Cupons Fiscais por Troca: " . $number->format($relatorio['media_cf'],array('places'=>2,'decimals'=>',','thousands'=>'.','before'=>'')); ?></p>
    <br />
    <p><?php echo "Número de Brindes: " . $relatorio['total_brindes']; ?></p>
    <p><?php echo "Média de Brindes por Troca: " . $number->format($relatorio['media_brindes'],array('places'=>2,'decimals'=>',','thousands'=>'.','before'=>'')); ?></p>
    <br />
    <p><?php echo "Número de Cupons Promocionais: " . $relatorio['total_cp']; ?></p>
    <p><?php echo "Média de Cupons Promocionais por Troca: " . $number->format($relatorio['media_cp'],array('places'=>2,'decimals'=>',','thousands'=>'.','before'=>'')); ?></p>
</div>
<div class="clear"></div>

<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Trocas</h1>
</div>
<div class="clear"></div>


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
    <?php $paginator->options(array('url' => $this->passedArgs)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
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
                    'url' => array('action' => 'view', 'controller' =>'trocas', $troca['Troca']['id'])
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

