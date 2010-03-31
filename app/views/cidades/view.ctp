<div class="cidades view">
<h2><?php  __('Cidade');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cidade['Cidade']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cidade['Cidade']['estado_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cidade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cidade['Cidade']['cidade']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cep'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cidade['Cidade']['cep']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Cidade', true), array('action' => 'edit', $cidade['Cidade']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Cidade', true), array('action' => 'delete', $cidade['Cidade']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cidade['Cidade']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Cidades', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Cidade', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
