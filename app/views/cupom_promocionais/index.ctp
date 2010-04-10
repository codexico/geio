<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Cupons Promocionais</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Inserir Cupom', array('action' => 'add'), array('class' => 'btn_azul floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="cupomPromocionais index">

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
			<th class="w5"><?php echo $paginator->sort('id');?></th>
			<th class="w10"><?php echo $paginator->sort('troca_id');?></th>
			<th class="w20"><?php echo $paginator->sort('promotor_id');?></th>
			<th class="w15"><?php echo $paginator->sort('consumidor_id');?></th>
			<th class="w15"><?php echo $paginator->sort('data_impressao');?></th>
			<th class="w15 actions"></th>
		</tr>
		<?php
		$i = 0;
		foreach ($cupomPromocionais as $cupomPromocional):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td>
				<?php echo $cupomPromocional['CupomPromocional']['id']; ?>
			</td>
			<td>
				<?php echo $cupomPromocional['CupomPromocional']['troca_id']; ?>
			</td>
			<td>
				<?php echo $cupomPromocional['CupomPromocional']['promotor_id']; ?>
			</td>
			<td>
				<?php echo $cupomPromocional['CupomPromocional']['consumidor_id']; ?>
			</td>
			<td>
				<?php echo $cupomPromocional['CupomPromocional']['data_impressao']; ?>
			</td>
			<td>
				<?php echo $cupomPromocional['CupomPromocional']['created']; ?>
			</td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('action' => 'view', $cupomPromocional['CupomPromocional']['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('action' => 'edit', $cupomPromocional['CupomPromocional']['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('action' => 'delete', $cupomPromocional['CupomPromocional']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cupomPromocional['CupomPromocional']['id'])); ?>
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