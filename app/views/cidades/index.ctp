<div class="cidades index">
<h2><?php __('Cidades');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('estado_id');?></th>
	<th><?php echo $paginator->sort('cidade');?></th>
	<th><?php echo $paginator->sort('cep');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($cidades as $cidade):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $cidade['Cidade']['id']; ?>
		</td>
		<td>
			<?php echo $cidade['Cidade']['estado_id']; ?>
		</td>
		<td>
			<?php echo $cidade['Cidade']['cidade']; ?>
		</td>
		<td>
			<?php echo $cidade['Cidade']['cep']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $cidade['Cidade']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $cidade['Cidade']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $cidade['Cidade']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cidade['Cidade']['id'])); ?>
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
		<li><?php echo $html->link(__('New Cidade', true), array('action' => 'add')); ?></li>
	</ul>
</div>
