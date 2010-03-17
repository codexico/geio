<div class="usuarios form">
    <?php echo $form->create('Usuario');?>
    <fieldset>
        <legend><?php __('Add Usuario');?></legend>
        <?php

        //echo $form->input('user_id');
        echo $form->input('User.username');

        //That effectively eliminates the annoying Auth habit of hashing your password.
        echo $form->input('User.passwd', array('label' => 'Senha'));
        echo $form->input('User.passwd_confirm', array('type' => 'password', 'label' => 'Repita a senha'));
        
        echo $form->input('nome');
        echo $form->input('email');

        ?>
    </fieldset>
    <?php echo $form->end('Submit');?>
</div>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('List Usuarios', true), array('action' => 'index'));?></li>
    </ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
