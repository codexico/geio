<div class="lojas index">
<h2><?php __('Lojas');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('razao_social');?></th>
	<th><?php echo $paginator->sort('nome_fantasia');?></th>
	<th><?php echo $paginator->sort('participante');?></th>
	<th><?php echo $paginator->sort('cnpj');?></th>
	<th><?php echo $paginator->sort('numero_da_loja');?></th>
	<th><?php echo $paginator->sort('ramo_de_atividade');?></th>
	<th><?php echo $paginator->sort('contato');?></th>
	<th><?php echo $paginator->sort('email_contato');?></th>
	<th><?php echo $paginator->sort('telefone');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($lojas as $loja):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $loja['Loja']['id']; ?>
		</td>
		<td>
			<?php echo $loja['Loja']['razao_social']; ?>
		</td>
		<td>
			<?php echo $loja['Loja']['nome_fantasia']; ?>
		</td>
		<td>
			<?php echo $loja['Loja']['participante']; ?>
		</td>
		<td>
			<?php echo $loja['Loja']['cnpj']; ?>
		</td>
		<td>
			<?php echo $loja['Loja']['numero_da_loja']; ?>
		</td>
		<td>
			<?php echo $loja['Loja']['ramo_de_atividade']; ?>
		</td>
		<td>
			<?php echo $loja['Loja']['contato']; ?>
		</td>
		<td>
			<?php echo $loja['Loja']['email_contato']; ?>
		</td>
		<td>
			<?php echo $loja['Loja']['telefone']; ?>
		</td>
		<td>
			<?php echo $loja['Loja']['created']; ?>
		</td>
		<td>
			<?php echo $loja['Loja']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $loja['Loja']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $loja['Loja']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $loja['Loja']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $loja['Loja']['id'])); ?>
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
		<li><?php echo $html->link(__('New Loja', true), array('action' => 'add')); ?></li>
	</ul>
</div>
