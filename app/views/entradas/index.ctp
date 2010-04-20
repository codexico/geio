<div class="entradas index">
<h2><?php __('Entradas');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('brinde_id');?></th>
	<th><?php echo $paginator->sort('qtd');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($entradas as $entrada):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $entrada['Entrada']['id']; ?>
		</td>
		<td>
			<?php echo $entrada['Entrada']['created']; ?>
		</td>
		<td>
			<?php echo $entrada['Entrada']['modified']; ?>
		</td>
		<td>
			<?php echo $entrada['Entrada']['brinde_id']; ?>
		</td>
		<td>
			<?php echo $entrada['Entrada']['qtd']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $entrada['Entrada']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $entrada['Entrada']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $entrada['Entrada']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $entrada['Entrada']['id'])); ?>
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
		<li><?php echo $html->link(__('New Entrada', true), array('action' => 'add')); ?></li>
	</ul>
</div>
