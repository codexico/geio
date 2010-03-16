<div class="cupomPromocionais index">
<h2><?php __('CupomPromocionais');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('troca_id');?></th>
	<th><?php echo $paginator->sort('promotor_id');?></th>
	<th><?php echo $paginator->sort('consumidor_id');?></th>
	<th><?php echo $paginator->sort('data_impressao');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($cupomPromocionais as $cupomPromocional):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $cupomPromocional['CupomPromocional']['id']; ?>
		</td>
		<td>
			<?php echo $cupomPromocional['CupomPromocional']['troca_id']; ?>
		</td>
		<td>
			<?php echo $cupomPromocional['CupomPromocional']['promotor_id']; ?>
		</td>
		<td>
			<?php echo $cupomPromocional['CupomPromocional']['consumidor_id']; ?>
		</td>
		<td>
			<?php echo $cupomPromocional['CupomPromocional']['data_impressao']; ?>
		</td>
		<td>
			<?php echo $cupomPromocional['CupomPromocional']['created']; ?>
		</td>
		<td>
			<?php echo $cupomPromocional['CupomPromocional']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $cupomPromocional['CupomPromocional']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $cupomPromocional['CupomPromocional']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $cupomPromocional['CupomPromocional']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cupomPromocional['CupomPromocional']['id'])); ?>
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
		<li><?php echo $html->link(__('New CupomPromocional', true), array('action' => 'add')); ?></li>
	</ul>
</div>
