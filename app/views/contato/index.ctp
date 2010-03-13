<?php
//echo $smtperrors;
?>
<?php /*
<?php echo $form->create(false,array('action'=>'index'));?>
    <fieldset>
        <legend><?php __('Contato');?></legend>
        <?php
        echo $form->input('nome');
        echo $form->input('email');
        echo $form->input('mensagem', array( 'rows' => 4));
        ?>
    </fieldset>
    <?php echo $form->end('Enviar');?>
        <?php pr($this->data); ?>
 *
*/
?>
<?php
echo $form->create('Contato',array('action'=>'index'));
echo $form->inputs(array('legend'=>'Contato'));// o inputs gera todos os inouts de uma so vez, viva cake!
echo $form->end('Enviar');

?>
