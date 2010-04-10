<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Visualizar Consumidor</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">

    <?php echo $html->link('Voltar', '/funcionarios', array('class'=>'btn_cinza floatRight')); ?>
    <?php echo $html->link('Consumidores', array('action' => 'index'), array('class' => 'btn_azul floatRight mgr5')); ?>
    <?php echo $html->link('Incluir Consumidor', array('action' => 'add'), array('class' => 'btn_azul floatRight mgr5')); ?>
    <?php echo $html->link('Editar Consumidor', array('action' => 'edit', $consumidor['Consumidor']['id']), array('class' => 'btn_azul floatRight mgr5')); ?>
    <?php echo $html->link('Excluir Consumidor', array('action' => 'delete', $consumidor['Consumidor']['id']), array('class' => 'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $consumidor['Consumidor']['id'])); ?>

</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="consumidores view">
    <dl>
        <?php $i = 0;
$class = ' class="altrow"';?>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['id']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['nome']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rg'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['rg']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cpf'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['cpf']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['email']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cel'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['cel']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tel'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['tel']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sexo'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['sexo']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nascimento'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo date('d/m/Y', strtotime($consumidor['Consumidor']['nascimento']) ); ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado Civil'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['estado_civil']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grau De Instrucao'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['grau_de_instrucao']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Profissao'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['profissao']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CEP'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['cep']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Endereço'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['endereco']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Número'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['numero']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bairro'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['bairro']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cidade'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['cidade']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['estado']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Complemento'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['complemento']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('País'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['pais']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Obs'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $consumidor['Consumidor']['obs']; ?>
                &nbsp;
            </dd>
        </div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
            <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo date('d,m,Y',strtotime($consumidor['Consumidor']['created'])); ?>
                &nbsp;
            </dd>
        </div>
    </dl>
</div>
<div class="clear"></div>