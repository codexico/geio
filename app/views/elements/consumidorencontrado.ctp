<div class="consumidores view">
    <h2><?php  __('Consumidor');?></h2>
    <p>
<?php echo $html->link('Aceitar e ir para o cadastro de Cupons', array('controller'=>'trocas','action' => 'nova', $consumidor['Consumidor']['id'])); ?>
    </p>
    <dl><?php $i = 0;
$class = ' class="altrow"';?>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['nome']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rg'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['rg']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cpf'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['cpf']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['email']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cel'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['cel']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tel'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['tel']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sexo'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['sexo']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nascimento'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['nascimento']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado Civil'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['estado_civil']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grau De Instrucao'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['grau_de_instrucao']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Profissao'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['profissao']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Obs'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['obs']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['created']; ?>
            &nbsp;
        </dd>
    </dl>
    <p>
<?php echo $html->link(__('Edit Consumidor', true), array('action' => 'edit', $consumidor['Consumidor']['id'])); ?>
    </p>
</div>