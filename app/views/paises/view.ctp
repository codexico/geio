<div class="paises view">
<h2><?php  __('Paise');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paise['Paise']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Iso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paise['Paise']['iso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Iso3'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paise['Paise']['iso3']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numcode'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paise['Paise']['numcode']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paise['Paise']['nome']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Paise', true), array('action' => 'edit', $paise['Paise']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Paise', true), array('action' => 'delete', $paise['Paise']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $paise['Paise']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Paises', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Paise', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
