<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
/* @var $paginator PaginatorHelper */
?>
<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Visualizar Troca</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/trocas', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link('Excluir Troca', array('action' => 'delete', $troca['Troca']['id']), array('class' => 'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $troca['Troca']['id'])); ?>
	<?php echo $html->link('Editar Troca', array('action' => 'edit', $troca['Troca']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php/* echo $html->link('Incluir Troca', array('action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); */?>
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
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RG'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['rg']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CPF'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['cpf']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('E-mail'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['email']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefone'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['tel']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Celular'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['cel']; ?>
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
                            <?php echo date('d/m/Y', strtotime($troca['Consumidor']['nascimento']) ); ?>
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
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grau de Instru&ccedil;&atilde;o'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['grau_de_instrucao']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Profiss&atilde;o'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['profissao']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Observa&ccedil;&otilde;es'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Consumidor']['obs']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo date('d/m/Y',strtotime($troca['Consumidor']['created'])); ?>
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
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Promotor'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php echo $html->link($troca['Promotor']['nome'], array('controller'=>'promotores','action' => 'view', $troca['Promotor']['id'])); ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Consumidor'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
                            <?php echo $html->link($troca['Consumidor']['nome'], array('controller'=>'consumidores','action' => 'view', $troca['Consumidor']['id'])); ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo date('d/m/Y - H:i', strtotime($troca['Troca']['created']) ); ?>
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
			<th class="txtCenter">
				<?php echo $paginator->sort('id',null, array('url' =>  array( 'action'=>'view/'.$troca['Troca']['id']) ) );?>
			</th>
			<th class="txtCenter">
				<?php echo $paginator->sort('Nr. Cupom Fiscal', 'codigo', array('url' =>  array( 'action'=>'view/'.$troca['Troca']['id']) ) );?>
			</th>
			<th>
				<?php echo $paginator->sort('Loja','Loja.nome_fantasia', array('url' =>  array( 'action'=>'view/'.$troca['Troca']['id']) ) );?>
			</th>
			<th class="txtCenter">
				<?php echo $paginator->sort('Valor R$','valor', array('url' =>  array( 'action'=>'view/'.$troca['Troca']['id']) ) );?>
			</th>
			<th class="txtCenter">
				<?php echo $paginator->sort('forma_de_pagamento',null, array('url' =>  array( 'action'=>'view/'.$troca['Troca']['id']) ) );?>
			</th>
			<th class="txtCenter">
				<?php echo $paginator->sort('bandeira',null, array('url' =>  array( 'action'=>'view/'.$troca['Troca']['id']) ) );?>
			</th>
			<th class="txtCenter">
				<?php echo $paginator->sort('created',null, array('url' =>  array( 'action'=>'view/'.$troca['Troca']['id']) ) );?>
			</th>
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
			<td class="txtCenter">
				<?php echo $html->link($cupomFiscal['CupomFiscal']['id'], array('controller' => 'cupom_fiscais', 'action' => 'view', $cupomFiscal['CupomFiscal']['id'])); ?>
			</td>
			<td class="txtCenter">
				<?php echo $cupomFiscal['CupomFiscal']['codigo']; ?>
			</td>
			<td>
				<?php echo $html->link($cupomFiscal['Loja']['nome_fantasia'], array('controller' => 'lojas', 'action' => 'view', $cupomFiscal['Loja']['id'])); ?>
			</td>
			<td class="txtCenter">
				<?php echo $cupomFiscal['CupomFiscal']['valor']; ?>
			</td>
			<td class="txtCenter">
				<?php echo $cupomFiscal['CupomFiscal']['forma_de_pagamento']; ?>
			</td>
			<td class="txtCenter">
				<?php echo $cupomFiscal['CupomFiscal']['bandeira']; ?>
			</td>
			<td class="txtCenter">
				<?php echo date('d/m/Y - H:i',strtotime($cupomFiscal['CupomFiscal']['created'])); ?>
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
