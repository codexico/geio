<div class="trocas view">
<h2><?php  __('Troca');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $troca['Troca']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Promotor Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $troca['Troca']['promotor_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Consumidor Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $troca['Troca']['consumidor_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $troca['Troca']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $troca['Troca']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Troca', true), array('action' => 'edit', $troca['Troca']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Troca', true), array('action' => 'delete', $troca['Troca']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $troca['Troca']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Trocas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Troca', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
