<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1><?php __('Visualizar Funcion&aacute;rio');?></h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">

	<?php echo $html->link('Voltar', '/funcionarios', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link(__('List Funcionarios', true), array('action' => 'index'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link(__('Novo Funcionario', true), array('action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link(__('Edit Funcionario', true), array('action' => 'edit', $funcionario['Funcionario']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
	<?php echo $html->link(__('Delete Funcionario', true), array('action' => 'delete', $funcionario['Funcionario']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $funcionario['Funcionario']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>

</div>

<div class="funcionarios view">
	<dl>
		<?php $i = 0; $class = ' class="altrow"';?>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['id']; ?>
				&nbsp;
				The body style sets the font to arial as first choice, verdana as second choice and the generic sans-serif as default (you should always set a default generic font as the final choice in the font-family list). The default font size is set in ems to allow the text size to be user selectable. This menu can be infinitely resized and it will always stay in shape.
			</dd>
		</div>

		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['nome']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RG:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['rg']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CPF:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['cpf']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Loja:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['loja_id']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefone:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['tel']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Celular:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['cel']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('E-mail:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['email']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sexo:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['sexo']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nascimento:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['nascimento']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Profiss&atilde;o:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['profissao']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Observa&ccedil;&atilde;o:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['obs']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Criado em:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['created']; ?>
				&nbsp;
			</dd>
		</div>
		<div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modificado em:'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $funcionario['Funcionario']['modified']; ?>
				&nbsp;
			</dd>
		</div>
	</dl>
</div>
<div class="clear"></div>