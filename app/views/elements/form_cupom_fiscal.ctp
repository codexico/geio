<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
//$javascript->link(array('jquery-1.4.2.min'), false);// foi para o layout
$javascript->link(array('trocas_nova'), false);
?>
<li class="cupom" id="cupom-fiscal-<?=$i;?>">
	<div class="cupom-header">
		<div class="cupom-titulo">Cupom Fiscal #<?=$i+1;?></div>
		<div class="cupom-botoes">
			<input id="remover-cupom-fiscal-<?=$i;?>" class="remover-cupom-fiscal submit" type="button" value="Remover este Cupom" />
		</div>
		<div class="clear"></div>
	</div>

	<div class="form">
        <?php
	        echo $form->input('CupomFiscal.'.$i.'.codigo', array('label'=>'Número do Cupom Fiscal'));
			$data_compra['day'] = $data_compra['month'] = $data_compra['year'] = $data_compra['hour'] =$data_compra['minute'] ='';
			if(!isset ($this->data['CupomFiscal'][$i]['data_compra'])) {
				$data_compra = date_parse(date('Y-m-d H:i:s',strtotime("now -3 hours")));//quanto tempo a pessoa demora para ir trocar o cupom fiscal, 3 horas?
			}
        ?>
			<div class="input select">
				<label for="CupomFiscal<?=$i?>DataCompraDay">Data do Cupom Fiscal</label>
				<?php echo $form->day('CupomFiscal.'.$i.'.data_compra', $data_compra['day'], array('class'=>'select_dia'), true); ?>
				<?php echo $form->month('CupomFiscal.'.$i.'.data_compra', $data_compra['month'], array('class'=>'select_mes'), true); ?>
				<?php echo $form->year('CupomFiscal.'.$i.'.data_compra', 1900, 2010, $data_compra['year'], array('class'=>'select_ano')); ?>
				&nbsp;-&nbsp;
				<?php echo $form->hour('CupomFiscal.'.$i.'.data_compra', true, $data_compra['hour'], array('class'=>'select_hora')); ?>&nbsp;h&nbsp;&nbsp;
				<?php echo $form->minute('CupomFiscal.'.$i.'.data_compra', $data_compra['minute'], array('class'=>'select_minuto')); ?>&nbsp;min
			</div>
        <?php
			echo $form->input('CupomFiscal.'.$i.'.loja_id', array('class'=> 'nomefantasia','label'=>'Nome Fantasia'));
			echo $form->input('CupomFiscal.'.$i.'.loja_razao_social',array(
			'options'=> $lojasRazaoSocial,
			'class'=>'razaosocial',
			'label'=>'Razão Social'));

			echo $form->input('CupomFiscal.'.$i.'.valor', array('class'=> 'nomefantasia','label'=>'Valor R$ (formato: xxxx,xx ou xxxxx.xx)'));

			echo '<div class="duas_colunas">';
	
				echo $form->input('CupomFiscal.'.$i.'.forma_de_pagamento', array('options' => array(
						'Dinheiro'=>'Dinheiro',
						'Debito'=>'Débito',
						'Credito'=>'Crédito'
				),
				'label' => 'Forma de Pagamento',
				'div' => 'input meio_input'));
		
				$bandeira ='';
				if(isset ($this->data['CupomFiscal'][$i]['bandeira'])) {
					$bandeira = $this->data['CupomFiscal'][$i]['bandeira'];
				}
	
				echo $form->input('CupomFiscal.'.$i.'.bandeira', array('options' => array(
						'VISA'=>'VISA',
						'MasterCard'=>'MasterCard',
						'HiperCard'=>'HiperCard',
						'Diners'=>'Diners',
						'Aura'=>'Aura',
						'American Express'=>'American Express',
						'outro'=>'Outro'
				),
				'selected'=>$bandeira,
				'empty' => true, 
				'div' => 'input meio_input'));
	
			echo '</div>';
        ?>

	</div>
	<div class="clear"></div>
</li>