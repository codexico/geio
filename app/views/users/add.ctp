<div class="users form">
    <?php echo $form->create('User');?>
    <fieldset>
        <legend><?php __('Add User');?></legend>
        <?php
        echo $form->input('username');

        //echo $form->input('password');
        //That effectively eliminates the annoying Auth habit of hashing your password.
        echo $form->input('passwd', array('label' => 'Senha'));
        echo $form->input('passwd_confirm', array('type' => 'password', 'label' => 'Repita a senha'));


        //echo $form->input('group_id');
        $label = "<label for='UserGroupId'>Grupo</label>";
        $select = $form->select('group_id', $groups, null, null, false);
        echo
        $html->div("input required select",
        $label . $select,
        null, null, false);

        ?>
    </fieldset>
    <?php echo $form->end('Submit');?>
</div>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('List Users', true), array('action' => 'index'));?></li>
    </ul>

    <?php
    echo $this->element('admin_links');
    ?>

</div>
