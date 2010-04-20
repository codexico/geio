<div class="entradas view">
<h2><?php  __('Entrada');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entrada['Entrada']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entrada['Entrada']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entrada['Entrada']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Brinde Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entrada['Entrada']['brinde_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Qtd'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entrada['Entrada']['qtd']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Entrada', true), array('action' => 'edit', $entrada['Entrada']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Entrada', true), array('action' => 'delete', $entrada['Entrada']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $entrada['Entrada']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Entradas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Entrada', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
