<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Visualizar Troca</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">

	<?php echo $html->link('Voltar', '/trocas', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link('Incluir Troca', array('action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Editar Troca', array('action' => 'edit', $troca['Troca']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Excluir Troca', array('action' => 'delete', $troca['Troca']['id']), array('class' => 'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $troca['Troca']['id'])); ?>

</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="consumidores view">

    <dl>
		<?php $i = 0;
        $class = ' class="altrow"';?>

		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['id']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['nome']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rg'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['rg']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cpf'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['cpf']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['email']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cel'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['cel']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tel'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['tel']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sexo'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['sexo']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nascimento'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['nascimento']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado Civil'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['estado_civil']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grau De Instrucao'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['grau_de_instrucao']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Profissao'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['profissao']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Obs'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['obs']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['created']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['modified']; ?>
				&nbsp;
			</dd>
		</div>
    </dl>
</div>
<div class="clear"></div>

<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Dados da Troca</h1>
</div>
<div class="clear"></div>

<div class="trocas view">

	<dl>
		<?php $i = 0; $class = ' class="altrow"';?>

		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Troca']['id']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Promotor Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Troca']['promotor_id']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Consumidor Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Troca']['consumidor_id']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Troca']['created']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Troca']['modified']; ?>
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
			<th><?php echo $paginator->sort('loja_id');?></th>
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
				<?php echo $html->link($cupomFiscal['Loja']['nome_fantasia'], array('controller' => 'lojas', 'action' => 'view', $cupomFiscal['Loja']['id'])); ?>
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
