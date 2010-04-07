<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Inserir Loja</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/lojas', array('class'=>'btn_cinza floatRight')); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="lojas form">
    <?php echo $form->create('Loja');?>
    <fieldset>
        <legend>Dados Gerais</legend>
        <?php
        echo $form->input('razao_social');
        echo $form->input('nome_fantasia');
        echo $form->input('participante');
        echo $form->input('cnpj', array('label' => 'CNPJ (formato XX.XXX.XXX/XXXX-XX)'));
        echo $form->input('numero_da_loja');
        //echo $form->input('ramo_de_atividade');

        echo $form->input('ramo_de_atividade', array('options' => array(
                'Calçado'=>'Calçado',
                'Alimentação'=>'Alimentação',
                'Confecção'=>'Confecção',
                'Eletrônicos'=>'Eletrônicos',
                'Brinquedos'=>'Brinquedos',
                'Beleza e Higiene Pessoal'=>'Beleza e Higiene Pessoal',
                'Cosméticos'=>'Cosméticos',
                'Saúde'=>'Saúde',
                'Serviços'=>'Serviços',
                'outro'=>'outro'
        ),
        'selected'=>'',
        'empty' => true));
        echo $form->input('contato');
        echo $form->input('email_contato');
        echo $form->input('telefone');
        ?>
    </fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>