<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Visualizar Loja</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">

	<?php echo $html->link('Voltar', '/lojas', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link('Lojas', array('action' => 'index'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Incluir Loja', array('action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Editar Loja', array('action' => 'edit', $loja['Loja']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Excluir Loja', array('action' => 'delete', $loja['Loja']['id']), array('class' => 'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $loja['Loja']['id'])); ?>

</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="lojas view">

	<dl>
		<?php $i = 0; $class = ' class="altrow"';?>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['id']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Razao Social'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['razao_social']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome Fantasia'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['nome_fantasia']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Participante'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['participante']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cnpj'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['cnpj']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero Da Loja'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['numero_da_loja']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ramo De Atividade'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['ramo_de_atividade']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contato'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['contato']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email Contato'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['email_contato']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefone'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['telefone']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['created']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $loja['Loja']['modified']; ?>
				&nbsp;
			</dd>
		</div>
	</dl>
</div>
<div class="clear"></div>

<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Cupons Fiscais</h1>
</div>
<div class="clear"></div>

<div class="cupomFiscais index">

	<!-- .pagina_atual -->
	<div class="pagina_atual">
		<div class="pagina_atual_conteudo">
			<p>
				<?php
				echo $paginator->counter(array(
				'format' => __('P&aacute;gina %page% de %pages%', true)
				));
				?>
			</p>
		</div>
	</div>

	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $paginator->sort('id');?></th>
			<th><?php echo $paginator->sort('codigo');?></th>
			<th><?php echo $paginator->sort('Consumidor','Consumidor.nome');?></th>
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
				<?php echo $cupomFiscal['Consumidor']['nome']; ?>
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
	</table>

	<!-- .paginacao -->
	<div class="paginacao">
		<div class="pagin_proximo"><?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?></div>
		<div class="pagin_numeros"><?php echo $paginator->numbers(array('before'=>'','after'=>'','tag'=>'a','separator'=>' '));?></div>
		<div class="pagin_anterior"><?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></div>
	</div>

</div>
