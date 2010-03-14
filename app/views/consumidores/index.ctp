<div class="consumidores index">
<h2><?php __('Consumidores');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('nome');?></th>
	<th><?php echo $paginator->sort('rg');?></th>
	<th><?php echo $paginator->sort('cpf');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('cel');?></th>
	<th><?php echo $paginator->sort('tel');?></th>
	<th><?php echo $paginator->sort('sexo');?></th>
	<th><?php echo $paginator->sort('nascimento');?></th>
	<th><?php echo $paginator->sort('estado_civil');?></th>
	<th><?php echo $paginator->sort('grau_de_instrucao');?></th>
	<th><?php echo $paginator->sort('profissao');?></th>
	<th><?php echo $paginator->sort('obs');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($consumidores as $consumidor):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $consumidor['Consumidor']['id']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['nome']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['rg']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['cpf']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['email']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['cel']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['tel']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['sexo']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['nascimento']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['estado_civil']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['grau_de_instrucao']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['profissao']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['obs']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['created']; ?>
		</td>
		<td>
			<?php echo $consumidor['Consumidor']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $consumidor['Consumidor']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $consumidor['Consumidor']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $consumidor['Consumidor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $consumidor['Consumidor']['id'])); ?>
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
		<li><?php echo $html->link(__('New Consumidor', true), array('action' => 'add')); ?></li>
	</ul>
</div>
