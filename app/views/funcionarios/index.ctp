<?php
//debug($funcionarios);
?>
<div class="funcionarios index">
<h2><?php __('Funcionarios');?></h2>
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
	<th><?php echo $paginator->sort('loja_id');?></th>
	<th><?php echo $paginator->sort('tel');?></th>
	<th><?php echo $paginator->sort('cel');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('sexo');?></th>
	<th><?php echo $paginator->sort('nascimento');?></th>
	<th><?php echo $paginator->sort('profissao');?></th>
	<th><?php echo $paginator->sort('obs');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($funcionarios as $funcionario):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $funcionario['Funcionario']['id']; ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['nome']; ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['rg']; ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['cpf']; ?>
		</td>
		<td>
			<?php 
                        //echo $funcionario['Funcionario']['loja_id'];
                        echo $funcionario['Loja']['nome_fantasia'];
                        ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['tel']; ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['cel']; ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['email']; ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['sexo']; ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['nascimento']; ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['profissao']; ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['obs']; ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['created']; ?>
		</td>
		<td>
			<?php echo $funcionario['Funcionario']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $funcionario['Funcionario']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $funcionario['Funcionario']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $funcionario['Funcionario']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $funcionario['Funcionario']['id'])); ?>
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
		<li><?php echo $html->link(__('New Funcionario', true), array('action' => 'add')); ?></li>
	</ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
