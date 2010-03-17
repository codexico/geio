<div class="cupomFiscais view">
<h2><?php  __('CupomFiscal');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomFiscal['CupomFiscal']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Codigo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomFiscal['CupomFiscal']['codigo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Troca'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($cupomFiscal['Troca']['id'], array('controller' => 'trocas', 'action' => 'view', $cupomFiscal['Troca']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Loja'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($cupomFiscal['Loja']['id'], array('controller' => 'lojas', 'action' => 'view', $cupomFiscal['Loja']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomFiscal['CupomFiscal']['valor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Forma De Pagamento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomFiscal['CupomFiscal']['forma_de_pagamento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bandeira'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomFiscal['CupomFiscal']['bandeira']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomFiscal['CupomFiscal']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomFiscal['CupomFiscal']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit CupomFiscal', true), array('action' => 'edit', $cupomFiscal['CupomFiscal']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete CupomFiscal', true), array('action' => 'delete', $cupomFiscal['CupomFiscal']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cupomFiscal['CupomFiscal']['id'])); ?> </li>
		<li><?php echo $html->link(__('List CupomFiscais', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New CupomFiscal', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Trocas', true), array('controller' => 'trocas', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Troca', true), array('controller' => 'trocas', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Lojas', true), array('controller' => 'lojas', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Loja', true), array('controller' => 'lojas', 'action' => 'add')); ?> </li>
	</ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
