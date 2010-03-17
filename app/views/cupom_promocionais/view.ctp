<div class="cupomPromocionais view">
<h2><?php  __('CupomPromocional');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomPromocional['CupomPromocional']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Troca Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomPromocional['CupomPromocional']['troca_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Promotor Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomPromocional['CupomPromocional']['promotor_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Consumidor Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomPromocional['CupomPromocional']['consumidor_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data Impressao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomPromocional['CupomPromocional']['data_impressao']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomPromocional['CupomPromocional']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cupomPromocional['CupomPromocional']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit CupomPromocional', true), array('action' => 'edit', $cupomPromocional['CupomPromocional']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete CupomPromocional', true), array('action' => 'delete', $cupomPromocional['CupomPromocional']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cupomPromocional['CupomPromocional']['id'])); ?> </li>
		<li><?php echo $html->link(__('List CupomPromocionais', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New CupomPromocional', true), array('action' => 'add')); ?> </li>
	</ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
