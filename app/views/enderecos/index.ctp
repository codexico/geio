<div class="enderecos index">
<h2><?php __('Enderecos');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('bairro_id');?></th>
	<th><?php echo $paginator->sort('cep');?></th>
	<th><?php echo $paginator->sort('logradouro');?></th>
	<th><?php echo $paginator->sort('complemento');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($enderecos as $endereco):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $endereco['Endereco']['id']; ?>
		</td>
		<td>
			<?php echo $endereco['Endereco']['bairro_id']; ?>
		</td>
		<td>
			<?php echo $endereco['Endereco']['cep']; ?>
		</td>
		<td>
			<?php echo $endereco['Endereco']['logradouro']; ?>
		</td>
		<td>
			<?php echo $endereco['Endereco']['complemento']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $endereco['Endereco']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $endereco['Endereco']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $endereco['Endereco']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $endereco['Endereco']['id'])); ?>
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
		<li><?php echo $html->link(__('New Endereco', true), array('action' => 'add')); ?></li>
	</ul>
</div>
