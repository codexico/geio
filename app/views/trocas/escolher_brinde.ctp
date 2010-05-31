<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Escolha dos Brindes</h1>
</div>
<div class="clear"></div>

<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
//debug($troca);
$javascript->link(array('jquery-1.4.2.min'), false);// false para ir em <head>
$javascript->link(array('trocas_escolher_brinde'), false);
?>

<?php
if( Configure::read('Regras.Brinde.true') ) {
    echo "<p>Consumidor trocou valor suficiente para ".$troca['Troca']['qtd_premios']." brindes.</p>";
    echo "<p>O Consumidor ainda pode receber  ".$brindesDisponiveis." brindes.</p>";
    echo "<br />";
}else{
    echo $html->link('Gerar Cupons Promocionais', array('controller'=>'CupomPromocionais', 'action' => 'cupomPdf',$troca['Troca']['id']));
}
echo "<div class='form'>";
    echo $form->create('Troca', array('action'=> 'salvar_brinde/'.$this->params['pass'][0],'id'=>'salvar_brinde') );

    echo $form->hidden('qtd_brindes', array('value'=>$brindesDisponiveis));
        echo $form->hidden('brinde_preco', array('value'=>Configure::read('Regras.Brinde.preco'), 'name'=>'brinde_preco', 'id'=>'brinde_preco' ) );

	//debug($brindes);
	echo "<fieldset>";
		echo "<legend>Lista de Brindes</legend>";
		$i=0;
		foreach ($brindes as $id => $brinde) {
			echo "<br /><span class='mgl10'><strong>";
			echo $brinde;
			echo  " - Estoque atual: ". $estoques[$id]."</strong></span>";
			echo $form->input( 'Premio.foreign_key.'.$id, array('label'=>'Quantidade','class'=>'qtd_brinde') );
		}
	echo "</fieldset>";
	echo $form->end(array('value'=>'Enviar','class'=>'submit enviar_qtd_brindes') );
echo "</div>";
?>

<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Dados da Troca</h1>
</div>
<div class="clear"></div>

<div class="trocas view">
    <dl>
		<?php $i = 0;
        $class = ' class="altrow"';?>
        <div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Troca']['id']; ?>
				&nbsp;
			</dd>
		</div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Promotor Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Troca']['promotor_id']; ?>
				&nbsp;
			</dd>
		</div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Consumidor Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Troca']['consumidor_id']; ?>
				&nbsp;
			</dd>
		</div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo date('d/m/Y H:i:s', strtotime($troca['Troca']['created']) ); ?>
				&nbsp;
			</dd>
		</div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valor Total'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo "R$ " . $troca['Troca']['valor_total']; ?>
				&nbsp;
			</dd>
		</div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('N° Cupons Fiscais'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Troca']['qtd_cf']; ?>
				&nbsp;
			</dd>
		</div>
        <div <?php if ($i % 2 == 0) echo $class;?>>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('N° Cupons Promocionais'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $troca['Troca']['qtd_cp']; ?>
				&nbsp;
			</dd>
		</div>
    </dl>
</div>
<div class="clear"></div>

<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Dados do Consumidor</h1>
</div>
<div class="clear"></div>
<?php
echo $this->element('consumidor');
?>
<div class="clear"></div>