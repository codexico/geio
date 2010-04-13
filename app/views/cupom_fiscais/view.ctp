<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Visualizar Cupom Fiscal</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/cupom_fiscais', array('class'=>'btn_cinza floatRight')); ?>
	<?php /*echo $html->link('Excluir Cupom Fiscal', array('action' => 'delete', $cupomFiscal['CupomFiscal']['id']), array('class' => 'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $cupomFiscal['CupomFiscal']['id'])); */?>
	<?php echo $html->link('Editar Cupom Fiscal', array('action' => 'edit', $cupomFiscal['CupomFiscal']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php /*echo $html->link('Inserir Cupom Fiscal', array('action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); */?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>

<div class="cupomFiscais view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomFiscal['CupomFiscal']['id']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Codigo'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomFiscal['CupomFiscal']['codigo']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Troca'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $html->link($cupomFiscal['Troca']['id'], array('controller' => 'trocas', 'action' => 'view', $cupomFiscal['Troca']['id'])); ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Loja'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $html->link($cupomFiscal['Loja']['nome_fantasia'], array('controller' => 'lojas', 'action' => 'view', $cupomFiscal['Loja']['id'])); ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valor'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomFiscal['CupomFiscal']['valor']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Forma de Pagamento'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomFiscal['CupomFiscal']['forma_de_pagamento']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bandeira'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomFiscal['CupomFiscal']['bandeira']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo date('d/m/Y - H:m',strtotime($cupomFiscal['CupomFiscal']['created'])); ?>
				&nbsp;
			</dd>
		</div>
	</dl>
</div>
<div class="clear"></div>