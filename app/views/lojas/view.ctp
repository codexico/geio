<div class="lojas view">
<h2><?php  __('Loja');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Razao Social'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['razao_social']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome Fantasia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['nome_fantasia']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Participante'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['participante']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cnpj'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['cnpj']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero Da Loja'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['numero_da_loja']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ramo De Atividade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['ramo_de_atividade']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['contato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email Contato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['email_contato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['telefone']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $loja['Loja']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="cupomFiscais index">
<h2><?php __('CupomFiscais');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
$paginator->options(array('url' => $this->passedArgs));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('codigo');?></th>
	<th><?php echo $paginator->sort('Valor R$','valor');?></th>
	<th><?php echo $paginator->sort('forma_de_pagamento');?></th>
	<th><?php echo $paginator->sort('bandeira');?></th>
	<th><?php echo $paginator->sort('created');?></th>
</tr>
<?php
$i = 0;
foreach ($cupomFiscais as $cupomFiscal):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $html->link($cupomFiscal['CupomFiscal']['id'], array('controller' => 'cupom_fiscais', 'action' => 'view', $cupomFiscal['CupomFiscal']['id'])); ?>
		</td>
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['codigo']; ?>
		</td>
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['valor']; ?>
		</td>
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['forma_de_pagamento']; ?>
		</td>
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['bandeira']; ?>
		</td>
		<td>
			<?php echo $cupomFiscal['CupomFiscal']['created']; ?>
		</td>
	</tr>
<?php endforeach; ?>
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('codigo');?></th>
	<th><?php echo $paginator->sort('Valor R$','valor');?></th>
	<th><?php echo $paginator->sort('forma_de_pagamento');?></th>
	<th><?php echo $paginator->sort('bandeira');?></th>
	<th><?php echo $paginator->sort('created');?></th>
</tr>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<?php /*
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Loja', true), array('action' => 'edit', $loja['Loja']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Loja', true), array('action' => 'delete', $loja['Loja']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $loja['Loja']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Lojas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Loja', true), array('action' => 'add')); ?> </li>
	</ul>

    <?php
    echo $this->element('admin_links');
    ?>
</div>
 */ ?>