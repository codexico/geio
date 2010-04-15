<div class="brindes index">
<h2><?php __('Brindes');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('valor');?></th>
	<th><?php echo $paginator->sort('estoque_inicial');?></th>
	<th><?php echo $paginator->sort('estoque_atual');?></th>
	<th><?php echo $paginator->sort('obs');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($brindes as $brinde):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $brinde['Brinde']['id']; ?>
		</td>
		<td>
			<?php echo $brinde['Brinde']['name']; ?>
		</td>
		<td>
			<?php echo $brinde['Brinde']['valor']; ?>
		</td>
		<td>
			<?php echo $brinde['Brinde']['estoque_inicial']; ?>
		</td>
		<td>
			<?php echo $brinde['Brinde']['estoque_atual']; ?>
		</td>
		<td>
			<?php echo $brinde['Brinde']['obs']; ?>
		</td>
		<td>
			<?php echo $brinde['Brinde']['created']; ?>
		</td>
		<td>
			<?php echo $brinde['Brinde']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $brinde['Brinde']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $brinde['Brinde']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $brinde['Brinde']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $brinde['Brinde']['id'])); ?>
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
		<li><?php echo $html->link(__('New Brinde', true), array('action' => 'add')); ?></li>
	</ul>
</div>
