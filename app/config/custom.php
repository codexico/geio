<?php

//http://book.cakephp.org/view/163/Localization-in-CakePHP
setlocale(LC_ALL, 'pt_BR', 'pt');
date_default_timezone_set('America/Sao_Paulo');
$config['Config.language'] = 'pt_BR';

/////////
//SISTEMA
/////////
$config['SITE_NAME'] = 'GEIO';


//email para o formulário de contato
$config['EMAIL_CONTATO'] =  'asdf@gmail.com';
$config['HOST_CONTATO'] =  'smtp.asdf.com.br';
$config['USERNAME_CONTATO'] =  'asdf@asdf.com.br';
$config['PASSWORD_CONTATO'] =  'xxxx';

$config['WEBMASTER_EMAIL'] =  'asdf@gmail.com';



/////////
//CAMPANHA
/////////
$config['Regras.Valor'] =  100;
$config['Campanha.Inicio'] =  date('Y-m-d', strtotime("1 May 2010"));


?>