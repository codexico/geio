<div class="cupomPromocionais form">
<?php echo $form->create('CupomPromocional');?>
	<fieldset>
 		<legend><?php __('Add CupomPromocional');?></legend>
	<?php
		echo $form->input('troca_id');
		echo $form->input('promotor_id');
		echo $form->input('consumidor_id');
		echo $form->input('data_impressao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List CupomPromocionais', true), array('action' => 'index'));?></li>
	</ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
