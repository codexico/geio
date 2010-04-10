<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Visualizar Promotor</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">

	<?php echo $html->link('Voltar', '/promotores', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link('Promotores', array('action' => 'index'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Incluir Promotor', array('action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Editar Promotor', array('action' => 'edit', $promotor['Promotor']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Excluir Promotor', array('action' => 'delete', $promotor['Promotor']['id']), array('class' => 'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $promotor['Promotor']['id'])); ?>

</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="promotores view">

	<dl>
		<?php $i = 0; $class = ' class="altrow"';?>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $promotor['Promotor']['id']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $promotor['Promotor']['nome']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $promotor['Promotor']['email']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rg'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $promotor['Promotor']['rg']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cpf'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $promotor['Promotor']['cpf']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $promotor['Promotor']['user_id']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Login'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $promotor['User']['username']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo date('d/m/Y - H:m',strtotime($promotor['Promotor']['created'])); ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tel'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $promotor['Promotor']['tel']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cel'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $promotor['Promotor']['cel']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Obs'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $promotor['Promotor']['obs']; ?>
				&nbsp;
			</dd>
		</div>
	</dl>
</div>
<div class="clear"></div>