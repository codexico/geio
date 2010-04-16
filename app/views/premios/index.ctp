<div class="premios index">
<h2><?php __('Premios');?></h2>
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
	<th><?php echo $paginator->sort('consumidor_id');?></th>
	<th><?php echo $paginator->sort('promotor_id');?></th>
	<th><?php echo $paginator->sort('model');?></th>
	<th><?php echo $paginator->sort('foreign_key');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($premios as $premio):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $premio['Premio']['id']; ?>
		</td>
		<td>
			<?php echo $premio['Premio']['troca_id']; ?>
		</td>
		<td>
			<?php echo $premio['Premio']['consumidor_id']; ?>
		</td>
		<td>
			<?php echo $premio['Premio']['promotor_id']; ?>
		</td>
		<td>
			<?php echo $premio['Premio']['model']; ?>
		</td>
		<td>
			<?php echo $premio['Premio']['foreign_key']; ?>
		</td>
		<td>
			<?php echo $premio['Premio']['created']; ?>
		</td>
		<td>
			<?php echo $premio['Premio']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $premio['Premio']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $premio['Premio']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $premio['Premio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $premio['Premio']['id'])); ?>
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
		<li><?php echo $html->link(__('New Premio', true), array('action' => 'add')); ?></li>
	</ul>
</div>
