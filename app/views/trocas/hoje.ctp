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
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('promotor_id');?></th>
	<th><?php echo $paginator->sort('consumidor_id');?></th>
	<th><?php echo $paginator->sort('Valor (R$)', 'valor_total');?></th>
	<th><?php echo $paginator->sort('pontos');?></th>
	<th><?php echo $paginator->sort('Cupons Promocionais','qtd_cp');?></th>
	<th><?php echo $paginator->sort('Data', 'created');?></th>
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
			<?php echo $troca['Troca']['promotor_id']; ?>
		</td>
		<td>
			<?php echo $troca['Troca']['consumidor_id']; ?>
		</td>
		<td>
			<?php echo number_format($troca['Troca']['valor_total'], 2); ?>
		</td>
		<td>
			<?php echo $troca['Troca']['pontos']; ?>
		</td>
		<td>
			<?php echo $troca['Troca']['qtd_cp']; ?>
		</td>
		<td>
			<?php echo $troca['Troca']['created']; ?>
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
</div>
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
