<div class="estados index">
<h2><?php __('Estados');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('paise_id');?></th>
	<th><?php echo $paginator->sort('sigla');?></th>
	<th><?php echo $paginator->sort('estado');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($estados as $estado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $estado['Estado']['id']; ?>
		</td>
		<td>
			<?php echo $estado['Estado']['paise_id']; ?>
		</td>
		<td>
			<?php echo $estado['Estado']['sigla']; ?>
		</td>
		<td>
			<?php echo $estado['Estado']['estado']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $estado['Estado']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $estado['Estado']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $estado['Estado']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $estado['Estado']['id'])); ?>
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
		<li><?php echo $html->link(__('New Estado', true), array('action' => 'add')); ?></li>
	</ul>
</div>
