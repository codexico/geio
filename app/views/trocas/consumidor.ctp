<div class="consumidores view">
    <dl><?php $i = 0;
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
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rg'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['rg']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cpf'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['cpf']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['email']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cel'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['cel']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tel'); ?></dt>
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
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grau De Instrucao'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['grau_de_instrucao']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Profissao'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['profissao']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Obs'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo $consumidor['Consumidor']['obs']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                <?php echo date('d/m/Y',strtotime($consumidor['Consumidor']['created'])); ?>
                &nbsp;
            </dd>
        </div>
    </dl>
</div>

<div class="clear"></div>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Trocas do Consumidor</h1>
</div>
<div class="clear"></div>
<div class="trocas index">
    <div class="relatorio">
        <?php /*
    <p><?php echo "Total de trocas de hoje: " . $countTrocas; ?></p>
    <p><?php echo "Valor total dos Cupons Fiscais trocados: R$ " . $valorCuponsFiscais[0]['total']; ?></p>
    <p><?php echo "Número de Cupons Fiscais trocados: " . $numCuponsFiscais; ?></p>
    <p><?php echo "Média de valor dos Cupons Fiscais: R$ " . $media; ?></p>
    <p><?php echo "Média de valor das trocas: R$ " . $mediaValorTroca; ?></p>
    <p><?php echo "Número de Cupons Promocionais impressos: " . $numCuponsPromocionais; ?></p>
    <p><?php echo "Número de consumidores que compraram com VISA: " . $numConsumidoresBandeira; ?></p>
    <p><?php echo "Número de consumidores novos que compraram com VISA: " . $numConsumidoresNovosBandeira; ?></p>
    <p><?php echo "Número de consumidores que não compraram com VISA: " . $numConsumidoresNotBandeira; ?></p>
    <p><?php echo "Número de consumidores novos que não compraram com VISA: " . $numConsumidoresNovosNotBandeira; ?></p>
        */ ?>
        <?php /* debug($mediaValorTroca); */ ?>
    </div>
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
            <th><?php echo $paginator->sort('id');?></th>
            <th><?php echo $paginator->sort('Data', 'created');?></th>
            <th><?php echo $paginator->sort('Valor (R$)', 'valor_total');?></th>
            <th><?php echo $paginator->sort('Cupons Promocionais','qtd_cp');?></th>
            <th><?php echo $paginator->sort('promotor_id');?></th>
            <?php /*
	<th class="actions"><?php __('Actions');?></th>
            */ ?>
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
                    <?php echo $troca['Troca']['id']; ?>
            </td>
            <td>
                    <?php echo date('d/m/Y - H:i', strtotime($troca['Troca']['created']) ); ?>
            </td>
            <td>
                    <?php echo $number->currency($troca['Troca']['valor_total'],'EUR',array('before'=>'','after'=>'')); ?>
            </td>
            <td>
                    <?php echo $troca['Troca']['qtd_cp']; ?>
            </td>
            <td>
                    <?php echo $html->link($troca['Promotor']['nome'], array('action' => 'view', 'controller' =>'promotores', $troca['Promotor']['id'])); ?>
            </td>
                <?php /*
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $troca['Troca']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $troca['Troca']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $troca['Troca']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $troca['Troca']['id'])); ?>
		</td>
                */ ?>
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
<?php /*
<div class="paging">
    <?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
    | 	<?php echo $paginator->numbers();?>
    <?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Troca', true), array('action' => 'add')); ?></li>
	</ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
*/ ?>