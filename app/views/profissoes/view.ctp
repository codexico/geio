<div class="profissoes view">
<h2><?php  __('Profissao');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $profissao['Profissao']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $profissao['Profissao']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $profissao['Profissao']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $profissao['Profissao']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Profissao', true), array('action' => 'edit', $profissao['Profissao']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Profissao', true), array('action' => 'delete', $profissao['Profissao']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $profissao['Profissao']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Profissoes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Profissao', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
