<?php

//http://book.cakephp.org/view/163/Localization-in-CakePHP
setlocale(LC_ALL, 'pt_BR', 'pt');
Configure::write('Config.language', 'pt_BR');

$config['SITE_NAME'] = 'Nome do Site';

//email para o formulário de contato
$config['EMAIL_CONTATO'] 	= 'asdf@gmail.com';
$config['HOST_CONTATO'] 	= 'smtp.asdf.com.br';
$config['USERNAME_CONTATO']	= 'asdf@asdf.com.br';
$config['PASSWORD_CONTATO']	= 'xxxx';

$config['WEBMASTER_EMAIL'] 	= 'asdf@gmail.com';
?>
