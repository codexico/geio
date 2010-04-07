<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Visualizar Cupom Promocional</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">

	<?php echo $html->link('Voltar', '/cumpom_promocionais', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link('Incluir Cupom Promocional', array('action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Editar Cupom Promocional', array('action' => 'edit', $cupomPromocional['CupomPromocional']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link('Excluir Cupom Promocional', array('action' => 'delete', $cupomPromocional['CupomPromocional']['id']), array('class' => 'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $cupomPromocional['CupomPromocional']['id'])); ?>

</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="cupomPromocionais view">

	<dl>
		<?php $i = 0; $class = ' class="altrow"';?>
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomPromocional['CupomPromocional']['id']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Troca Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomPromocional['CupomPromocional']['troca_id']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Promotor Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomPromocional['CupomPromocional']['promotor_id']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Consumidor Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomPromocional['CupomPromocional']['consumidor_id']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data Impressao'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomPromocional['CupomPromocional']['data_impressao']; ?>
				&nbsp;
			</dd>
		</div>	
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomPromocional['CupomPromocional']['created']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $cupomPromocional['CupomPromocional']['modified']; ?>
				&nbsp;
			</dd>
		</div>
	</dl>
</div>
<div class="clear"></div>