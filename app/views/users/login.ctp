<div class="form">
<?php
$session->flash('auth');
echo $form->create('User', array('action' => 'login'));
echo $form->inputs(array(
	'legend' => __('Login', true),
	'username',
	'password'
));
echo $form->end(array('label'=>'ENVIAR','class'=>'submit mgt20'));
?>
</div>