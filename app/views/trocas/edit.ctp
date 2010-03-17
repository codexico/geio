<div class="trocas form">
<?php echo $form->create('Troca');?>
	<fieldset>
 		<legend><?php __('Edit Troca');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('promotor_id');
		echo $form->input('consumidor_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Troca.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Troca.id'))); ?></li>
		<li><?php echo $html->link(__('List Trocas', true), array('action' => 'index'));?></li>
	</ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
