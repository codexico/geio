<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Trocas dos &uacute;ltimos 30 dias</h1>
</div>
<div class="clear"></div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>

<div class="trocas index">

	<div class="relatorio">
		<p><?php echo "Total de trocas de hoje: " . $countTrocas; ?></p>
		<p><?php echo "Número de Consumidores Novos: " . $numConsumidoresNovos; ?></p>
		<p><?php echo "Número de Consumidores Atendidos: " . $numConsumidoresAtendidos; ?></p>
		<p><?php echo "Número de Cupons Fiscais trocados: " . $numCuponsFiscais; ?></p>
		<p><?php echo "Valor total dos Cupons Fiscais trocados: R$ " . $valorCuponsFiscais[0]['total']; ?></p>
		<p><?php echo "Média de valor dos Cupons Fiscais: R$ " . $media; ?></p>
		<p><?php echo "Média de valor das trocas: R$ " . $mediaValorTroca; ?></p>
		<p><?php echo "Número de Cupons Promocionais impressos: " . $numCuponsPromocionais; ?></p>
		<p><?php echo "Número de consumidores que compraram com VISA: " . $numConsumidoresBandeira; ?></p>
		<p><?php echo "Número de consumidores que não compraram com VISA: " . $numConsumidoresNotBandeira; ?></p>
		<p><?php echo "Número de consumidores novos que compraram com VISA: " . $numConsumidoresNovosBandeira; ?></p>
		<p><?php echo "Número de consumidores novos que não compraram com VISA: " . $numConsumidoresNovosNotBandeira; ?></p>
		<?php /* debug($mediaValorTroca); */ ?>
	</div>

	<br />
	<hr />
	<br />

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
			<th class="w20"><?php echo $paginator->sort('Data', 'created');?></th>
			<th class="w5"><?php echo $paginator->sort('id');?></th>
			<th class="w30"><?php echo $paginator->sort('consumidor','Consumidor.nome');?></th>
			<th class="w15"><?php echo $paginator->sort('Valor (R$)', 'valor_total');?></th>
			<th class="w15"><?php echo $paginator->sort('Cupons Promocionais','qtd_cp');?></th>
			<th class="w15"><?php echo $paginator->sort('promotor','Promotor.nome');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($trocas as $troca):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td>
				<?php echo $troca['Troca']['created']; ?>
			</td>
			<td>
				<?php echo $html->link($troca['Troca']['id'], array('action' => 'view/'.$troca['Troca']['id'])); ?>
			</td>
			<td>
				<?php echo $html->link($troca['Consumidor']['nome'], array('action' => 'view', 'controller' =>'consumidores', $troca['Consumidor']['id'])); ?>
				<?php echo $html->link('Trocas', array('action' => 'consumidor', 'controller' =>'trocas', $troca['Consumidor']['id'])); ?>
			</td>
			<td>
				<?php echo number_format($troca['Troca']['valor_total'], 2); ?>
			</td>
			<td>
				<?php echo $troca['Troca']['qtd_cp']; ?>
			</td>
			<td>
				<?php echo $html->link($troca['Promotor']['nome'], array('action' => 'view', 'controller' =>'promotores', $troca['Promotor']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>

		<tr>
			<th>
				<?php echo "TOTAL"; ?>
			</th>
			<th>
				<?php echo $countTrocas; ?>
			</th>
			<th>
				<?php echo $numConsumidoresAtendidos; ?>
			</th>
			<th>
				<?php echo $valorCuponsFiscais[0]['total']; ?>
			</th>
			<th>
				<?php echo $numCuponsPromocionais; ?>
			</th>
			<th>
				<?php echo " "; ?>
			</th>
		</tr>
	</table>

	<!-- .paginacao -->
	<div class="paginacao">
		<div class="pagin_proximo"><?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?></div>
		<div class="pagin_numeros"><?php echo $paginator->numbers(array('before'=>'','after'=>'','tag'=>'li','separator'=>' '));?></div>
		<div class="pagin_anterior"><?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?></div>
	</div>

</div>