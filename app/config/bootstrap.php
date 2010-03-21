<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 *
 * This file is loaded automatically by the app/webroot/index.php file after the core bootstrap.php is loaded
 * This is an application wide file to load any function that is not used within a class define.
 * You can also use this to include or require any files in your application.
 *
 */
/**
 * The settings below can be used to set additional paths to models, views and controllers.
 * This is related to Ticket #470 (https://trac.cakephp.org/ticket/470)
 *
 * $modelPaths = array('full path to models', 'second full path to models', 'etc...');
 * $viewPaths = array('this path to views', 'second full path to views', 'etc...');
 * $controllerPaths = array('this path to controllers', 'second full path to controllers', 'etc...');
 *
 */
//EOF



	//separar para deixar mais claro
    Configure::load('custom');//carrega as constantes do site
/*
//http://book.cakephp.org/view/163/Localization-in-CakePHP
setlocale(LC_ALL, 'pt_BR', 'pt');
Configure::write('Config.language', 'pt_BR');
date_default_timezone_set('America/Sao_Paulo');

Configure::write('SITE_NAME', 'GEIO');
//$config['SITE_NAME'] = 'Nome do Site';

//email para o formulário de contato
Configure::write('EMAIL_CONTATO', 'asdf@gmail.com');
Configure::write('HOST_CONTATO', 'smtp.asdf.com.br');
Configure::write('USERNAME_CONTATO', 'asdf@asdf.com.br');
Configure::write('PASSWORD_CONTATO', 'xxxx');

Configure::write('WEBMASTER_EMAIL', 'asdf@gmail.com');



Configure::write('Regras.Dinheiro', 2000);
Configure::write('Regras.Visa', 150);
Configure::write('Regras.MasterCard', 100);

*/
?>