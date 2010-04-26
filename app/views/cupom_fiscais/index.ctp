<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Cupons Fiscais</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
    <?php /*
<div class="botoes">
	<?php echo $html->link('Inserir Cupom Fiscal', array('action' => 'add'), array('class' => 'btn_azul floatRight')); ?>
	<?php echo $html->link('Trocas', array('controller' => 'trocas', 'action' => 'index'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Inserir Troca', array('controller' => 'trocas', 'action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Lojas', array('controller' => 'lojas', 'action' => 'index'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Inserir Loja', array('controller' => 'lojas', 'action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
</div>
     */?>

<?php $session->flash(); ?>

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
			<th class="w5 txtCenter"><?php echo $paginator->sort('id');?></th>
			<th class="w15 txtCenter"><?php echo $paginator->sort('N. Cupom Fiscal', 'codigo');?></th>
			<th class="w5 txtCenter"><?php echo $paginator->sort('troca_id');?></th>
			<th class="w15"><?php echo $paginator->sort('loja_id');?></th>
			<th class="w10 txtCenter"><?php echo $paginator->sort('Valor R$','valor');?></th>
			<th class="w15 txtCenter"><?php echo $paginator->sort('forma_de_pagamento');?></th>
			<th class="w15 txtCenter"><?php echo $paginator->sort('bandeira');?></th>
			<th class="w10 actions"></th>
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
				<?php echo $cupomFiscal['CupomFiscal']['id']; ?>
			</td>
			<td class="txtCenter">
				<?php echo $cupomFiscal['CupomFiscal']['codigo']; ?>
			</td>
			<td class="txtCenter">
				<?php echo $html->link($cupomFiscal['Troca']['id'], array('controller' => 'trocas', 'action' => 'view', $cupomFiscal['Troca']['id'])); ?>
			</td>
			<td>
				<?php echo $html->link($cupomFiscal['Loja']['nome_fantasia'], array('controller' => 'lojas', 'action' => 'view', $cupomFiscal['Loja']['id'])); ?>
			</td>
			<td class="txtCenter">
				<?php echo $number->currency($cupomFiscal['CupomFiscal']['valor'],'EUR',array('before'=>'','after'=>'')); ?>
			</td>
			<td class="txtCenter">
				<?php echo $cupomFiscal['CupomFiscal']['forma_de_pagamento']; ?>
			</td>
			<td class="txtCenter">
                            <?php echo ($cupomFiscal['CupomFiscal']['bandeira']=='') ? 'Cash' : $cupomFiscal['CupomFiscal']['bandeira'] ; ?>
			</td>
			<td class="actions">
				<?php echo $html->image("ico_view.gif", array(
					"alt" => "Visualizar",
					'url' => array('action' => 'view', $cupomFiscal['CupomFiscal']['id'])
				)); ?>
				
				<?php /* echo $html->image("ico_edit.gif", array(
					"alt" => "Editar",
					'url' => array('action' => 'edit', $cupomFiscal['CupomFiscal']['id'])
				)); */ ?>
				
				<?php /* echo $html->image("ico_delete.gif", array(
					"alt" => "Excluir",
					'url' => array('action' => 'delete', $cupomFiscal['CupomFiscal']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cupomFiscal['CupomFiscal']['id'])
				)); */ ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>

	<!-- .paginacao -->
	<div class="paginacao">
		<div class="pagin_proximo"><?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?></div>
		<div class="pagin_numeros"><?php echo $paginator->numbers(array('before'=>'','after'=>'','tag'=>'li','separator'=>' '));?></div>
		<div class="pagin_anterior"><?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></div>
	</div>
</div>