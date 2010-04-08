<!-- .titulo -->
<div class="titulo">
	<?php echo $html->image('bullet_titulo.gif')?>
	<h1>Editar Loja</h1>
</div>
<div class="clear"></div>

<!-- .botoes -->
<div class="botoes">
	<?php echo $html->link('Voltar', '/lojas', array('class'=>'btn_cinza floatRight')); ?>
	<?php echo $html->link('Excluir Loja', array('action' => 'delete', $form->value('Loja.id')), array('class'=>'btn_azul floatRight mgr5'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Loja.id'))); ?>
</div>

<?php $session->flash('auth'); ?>
<?php $session->flash(); ?>


<div class="lojas form">
<?php echo $form->create('Loja');?>
	<fieldset>
 		<legend>Dados Gerais</legend>
	<?php
		echo $form->input('id');
		echo $form->input('razao_social', array('div' => 'input text mgt20', 'label' => 'Raz&atilde;o Social'));
		echo $form->input('nome_fantasia');
		echo $form->input('participante');
		echo $form->input('cnpj');
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
        'selected'=>$this->data['Loja']['ramo_de_atividade'],
        'empty' => true));
		echo $form->input('contato');
		echo $form->input('email_contato');
		echo $form->input('telefone');
	?>
	</fieldset>
    <?php echo $form->end(array('label'=>'ENVIAR','class'=>'submit'));?>
</div>