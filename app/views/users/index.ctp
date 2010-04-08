<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Usu&aacute;rios</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Inserir Usuario', array('action' => 'add'), array('class' => 'btn_azul floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="users index">

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
			<th class="w30"><?php echo $paginator->sort('username');?></th>
			<th class="w20"><?php echo $paginator->sort('group_id');?></th>
			<th class="w20"><?php echo $paginator->sort('modified');?></th>
			<th class="w15 actions"></th>
		</tr>
		<?php
		$i = 0;
		foreach ($users as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td>
				<?php echo $user['User']['id']; ?>
			</td>
			<td>
				<?php echo $user['User']['password']; ?>
			</td>
			<td>
				<?php echo $user['User']['group_id']; ?>
			</td>
			<td>
				<?php echo $user['User']['modified']; ?>
			</td>
			<td class="actions">

				<?php echo $html->image("ico_view.gif", array(
					"alt" => "Visualizar",
					'url' => array('action' => 'view', $user['User']['id'])
				)); ?>
				
				<?php echo $html->image("ico_edit.gif", array(
					"alt" => "Editar",
					'url' => array('action' => 'edit', $user['User']['id'])
				)); ?>
				
				<?php echo $html->image("ico_delete.gif", array(
					"alt" => "Excluir",
					'url' => array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])
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