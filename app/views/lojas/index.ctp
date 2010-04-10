<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Lojas</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Inserir Loja', array('action' => 'add'), array('class' => 'btn_azul floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="lojas index">
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
			<th class="w35"><?php echo $paginator->sort('razao_social');?></th>
			<th class="w30"><?php echo $paginator->sort('nome_fantasia');?></th>
			<th class="w10 actions"></th>
		</tr>
		<?php
		$i = 0;
		foreach ($lojas as $loja):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td class="txtCenter">
				<?php echo $loja['Loja']['id']; ?>
			</td>
			<td>
				<?php echo $loja['Loja']['razao_social']; ?>
			</td>
			<td>
				<?php echo $loja['Loja']['nome_fantasia']; ?>
			</td>
			<td class="actions">

				<?php echo $html->image("ico_view.gif", array(
					"alt" => "Visualizar",
					'url' => array('action' => 'view', $loja['Loja']['id'])
				)); ?>
				
				<?php echo $html->image("ico_edit.gif", array(
					"alt" => "Editar",
					'url' => array('action' => 'edit', $loja['Loja']['id'])
				)); ?>
				
				<?php echo $html->image("ico_delete.gif", array(
					"alt" => "Excluir",
					'url' => array('action' => 'delete', $loja['Loja']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $loja['Loja']['id'])
				)); ?>

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
