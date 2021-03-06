<div class="trocas index">
<h2><?php __('Trocas de Hoje');?></h2>

<div class="relatorio">
    <p><?php echo "Total de trocas de hoje: " . $countTrocas; ?></p>
    <p><?php echo "Número de Consumidores Atendidos: " . $numConsumidoresAtendidos; ?></p>
    <p><?php echo "Número de Consumidores Novos: " . $numConsumidoresNovos; ?></p>
    <p><?php echo "Valor total dos Cupons Fiscais trocados: R$ " . $valorCuponsFiscais[0]['total']; ?></p>
    <p><?php echo "Número de Cupons Fiscais trocados: " . $numCuponsFiscais; ?></p>
    <p><?php echo "Média de valor dos Cupons Fiscais: R$ " . $media; ?></p>
    <p><?php echo "Média de valor das trocas: R$ " . $mediaValorTroca; ?></p>
    <p><?php echo "Número de Cupons Promocionais impressos: " . $numCuponsPromocionais; ?></p>
    <p><?php echo "Número de consumidores que compraram com VISA: " . $numConsumidoresBandeira; ?></p>
    <p><?php echo "Número de consumidores novos que compraram com VISA: " . $numConsumidoresNovosBandeira; ?></p>
    <p><?php echo "Número de consumidores que não compraram com VISA: " . $numConsumidoresNotBandeira; ?></p>
    <p><?php echo "Número de consumidores novos que não compraram com VISA: " . $numConsumidoresNovosNotBandeira; ?></p>
<?php /* debug($mediaValorTroca); */ ?>
</div>
<br />
<hr />
<br />
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Data', 'created');?></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('consumidor_id');?></th>
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
			<?php echo date('d/m/Y H:i:s', strtotime($troca['Troca']['created']) ); ?>
		</td>
		<td>
			<?php echo $html->link($troca['Troca']['id'], array('action' => 'view/'.$troca['Troca']['id'])); ?>
		</td>
		<td>
                        <?php echo $html->link($troca['Consumidor']['nome'], array('action' => 'view', 'controller' =>'consumidores', $troca['Consumidor']['id'])); ?>
                        <?php echo $html->link('Trocas', array('action' => 'consumidor', 'controller' =>'trocas', $troca['Consumidor']['id'])); ?>
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

<tr>
	<th><?php echo $paginator->sort('Data', 'created');?></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('consumidor_id');?></th>
	<th><?php echo $paginator->sort('Valor (R$)', 'valor_total');?></th>
	<th><?php echo $paginator->sort('Cupons Promocionais','qtd_cp');?></th>
	<th><?php echo $paginator->sort('promotor_id');?></th>
                <?php /*
	<th class="actions"><?php __('Actions');?></th>
                 */ ?>
</tr>
        <tr>
		<th>
			<?php echo "TOTAL"; ?>
		</th>
		<th>
			<?php echo $countTrocas; ?>
		</th>
		<th>
			<?php echo $numConsumidoresAtendidos; ?>
		</th>
		<th>
			<?php echo $valorCuponsFiscais[0]['total']; ?>
		</th>
		<th>
			<?php echo $numCuponsPromocionais; ?>
		</th>
		<th>
			<?php echo " "; ?>
		</th>
                <?php /*
		<td class="actions">
		</td>
                */ ?>
	</tr>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<?php /*
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Troca', true), array('action' => 'add')); ?></li>
	</ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
*/ ?>