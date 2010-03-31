<div class="bairros view">
<h2><?php  __('Bairro');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bairro['Bairro']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cidade Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bairro['Bairro']['cidade_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bairro['Bairro']['descricao']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Bairro', true), array('action' => 'edit', $bairro['Bairro']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Bairro', true), array('action' => 'delete', $bairro['Bairro']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bairro['Bairro']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Bairros', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Bairro', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
