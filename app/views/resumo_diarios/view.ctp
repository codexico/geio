<div class="resumoDiarios view">
<h2><?php  __('ResumoDiario');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumoDiario['ResumoDiario']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumoDiario['ResumoDiario']['dia']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Qtd Consumidores'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumoDiario['ResumoDiario']['qtd_consumidores']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Qtd Consumidores Novos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumoDiario['ResumoDiario']['qtd_consumidores_novos']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Qtd Cupons Fiscais'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumoDiario['ResumoDiario']['qtd_cupons_fiscais']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Qtd Cupons Promocionais'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumoDiario['ResumoDiario']['qtd_cupons_promocionais']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valor Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumoDiario['ResumoDiario']['valor_total']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valor Bandeira'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumoDiario['ResumoDiario']['valor_bandeira']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valor-outros'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumoDiario['ResumoDiario']['valor-outros']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ticket Medio Consumidor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumoDiario['ResumoDiario']['ticket_medio_consumidor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ticket Medio Cupom Fiscal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumoDiario['ResumoDiario']['ticket_medio_cupom_fiscal']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit ResumoDiario', true), array('action' => 'edit', $resumoDiario['ResumoDiario']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete ResumoDiario', true), array('action' => 'delete', $resumoDiario['ResumoDiario']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumoDiario['ResumoDiario']['id'])); ?> </li>
		<li><?php echo $html->link(__('List ResumoDiarios', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New ResumoDiario', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
