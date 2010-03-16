<div class="cupomFiscais index">
<h2><?php __('CupomFiscais');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('codigo');?></th>
	<th><?php echo $paginator->sort('troca_id');?></th>
	<th><?php echo $paginator->sort('loja_id');?></th>
	<th><?php echo $paginator->sort('valor');?></th>
	<th><?php echo $paginator->sort('forma_de_pagamento');?></th>
	<th><?php echo $paginator->sort('bandeira');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
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
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['id']; ?>
		</td>
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['codigo']; ?>
		</td>
		<td>
			<?php echo $html->link($cupomFiscal['Troca']['id'], array('controller' => 'trocas', 'action' => 'view', $cupomFiscal['Troca']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($cupomFiscal['Loja']['id'], array('controller' => 'lojas', 'action' => 'view', $cupomFiscal['Loja']['id'])); ?>
		</td>
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['valor']; ?>
		</td>
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['forma_de_pagamento']; ?>
		</td>
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['bandeira']; ?>
		</td>
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['created']; ?>
		</td>
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $cupomFiscal['CupomFiscal']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $cupomFiscal['CupomFiscal']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $cupomFiscal['CupomFiscal']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cupomFiscal['CupomFiscal']['id'])); ?>
		</td>
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
		<li><?php echo $html->link(__('New CupomFiscal', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Trocas', true), array('controller' => 'trocas', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Troca', true), array('controller' => 'trocas', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Lojas', true), array('controller' => 'lojas', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Loja', true), array('controller' => 'lojas', 'action' => 'add')); ?> </li>
	</ul>
</div>
