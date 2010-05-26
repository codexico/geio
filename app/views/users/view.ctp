<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Visualizar Usu&aacute;rio</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">

	<?php echo $html->link('Voltar', '/users', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link('Incluir Usuario', array('action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Editar Usuario', array('action' => 'edit', $user['User']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Excluir Usuario', array('action' => 'delete', $user['User']['id']), array('class' => 'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>

</div>

<?php $session->flash(); ?>

<div class="users view">
	<dl>
		<?php $i = 0; $class = ' class="altrow"';?>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $user['User']['id']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $user['User']['username']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grupo'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $user['Group']['name']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo date('d/m/Y - H:i',strtotime($user['User']['created'])); ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo date('d/m/Y - H:i',strtotime($user['User']['modified'])); ?>
				&nbsp;
			</dd>
		</div>
	</dl>
</div>
<div class="clear"></div>