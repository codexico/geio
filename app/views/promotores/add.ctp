<div class="promotores form">
    <?php echo $form->create('Promotor');?>
    <fieldset>
        <legend><?php __('Add Promotor');?></legend>
        <?php

        //echo $form->input('user_id');
        echo $form->input('User.username');

        //That effectively eliminates the annoying Auth habit of hashing your password.
        echo $form->input('User.passwd', array('label' => 'Senha'));
        echo $form->input('User.passwd_confirm', array('type' => 'password', 'label' => 'Repita a senha'));

        echo $form->input('nome');
        echo $form->input('email');
        
        echo $form->input('rg', array('label' => 'RG'));
        echo $form->input('cpf', array('label' => 'CPF (somente números)'));
        
        echo $form->input('tel', array('label' => 'Telefone (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));
        echo $form->input('cel', array('label' => 'Celular (formatos: XXXX-XXXX, (XX) XXXX-XXXX, +XX (XX) XXXX-XXXX )'));

        echo $form->input('obs', array('type' => 'textarea', 'label' => 'Observações'));
        ?>
    </fieldset>
    <?php echo $form->end('Submit');?>
</div>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('List Promotores', true), array('action' => 'index'));?></li>
    </ul>
</div>
