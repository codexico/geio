<?php 
//debug($promotores);
?>
<div class="promotores index">
<h2><?php __('Promotores');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<!--<th><?php echo $paginator->sort('id');?></th>-->
	<th><?php echo $paginator->sort('nome');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('Login','User.username');?></th>
        <!--
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
        -->
	<th><?php echo $paginator->sort('tel');?></th>
	<th><?php echo $paginator->sort('cel');?></th>

        <!--
	<th><?php echo $paginator->sort('rg');?></th>
        <th><?php echo $paginator->sort('cpf');?></th>
        -->
	<th><?php echo $paginator->sort('obs');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($promotores as $promotor):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
            <!--
		<td>
			<?php echo $promotor['Promotor']['id']; ?>
		</td>
            -->
		<td>
			<?php echo $promotor['Promotor']['nome']; ?>
		</td>
		<td>
			<?php echo $promotor['Promotor']['email']; ?>
		</td>
		<td>
			<?php echo $promotor['User']['username']; ?>
		</td>
                <!--
		<td>
			<?php echo $promotor['Promotor']['user_id']; ?>
		</td>
		<td>
			<?php echo $promotor['Promotor']['created']; ?>
		</td>
		<td>
			<?php echo $promotor['Promotor']['modified']; ?>
		</td>
                -->
		<td>
			<?php echo $promotor['Promotor']['tel']; ?>
		</td>
		<td>
			<?php echo $promotor['Promotor']['cel']; ?>
		</td>
                <!--
		<td>
			<?php echo $promotor['Promotor']['rg']; ?>
		</td>
		<td>
			<?php echo $promotor['Promotor']['cpf']; ?>
		</td>
                -->
		<td>
			<?php echo $promotor['Promotor']['obs']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $promotor['Promotor']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $promotor['Promotor']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $promotor['Promotor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $promotor['Promotor']['id'])); ?>
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
		<li><?php echo $html->link(__('New Promotor', true), array('action' => 'add')); ?></li>
	</ul>
</div>
