<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $html->charset(); ?>
        <title>
            <?php /* __('CakePHP: the rapid development php framework:'); */ ?>
            <?php echo $title_for_layout; ?>
		- <?php 
            echo Configure::read('SITE_NAME');
            ?>
        </title>
        <script src="<?php echo $this->webroot.JS_URL; ?>jquery-1.4.2.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot.JS_URL; ?>jquery.maskedinput-1.2.2.min.js" type="text/javascript"></script>
        <?php
        echo $html->meta('icon');

        echo $html->css('reset');
        echo $html->css('global');


        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div class="logotipo">
                    <?php echo $html->link(
                    $html->image('logotipo_geio.jpg', array('alt'=> __("GEIO - Início", true))),
                    '/', null, null, false
                    );
                    ?>
                </div>
                <div class="painel_logado">
                    <!--<h5><?php echo $html->link(__('LOGIN', true), '/login'); ?></h5>-->
                    <ul>
                        <li>Olá <strong><?php echo $session->read('Auth.User.username') . " ! " ?></strong></li>
                        <li>|</li>
                        <li><a href="#"><strong>Meu Perfil</strong></a></li>
                        <li>|</li>
                        <li><a href="#"><strong>Trocar Senha</strong></a></li>
                        <li>|</li>
                        <li><a href="#"><strong>Ajuda</strong></a></li>
                        <li>|</li>
                        <?php    if ($session->read('Auth.User')) : ?>
                        <li><strong><?php echo $html->link(__('Sair', true), '/logout'); ?> </strong></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>


            <?php
            echo $this->element('menu_geio');
            ?>
            <?php /* Diego, coloquei o flash dentro do content, acho q assim resolve os problemas
                <?php $session->flash('auth'); ?>

                <?php $session->flash(); ?> */?>

            <div id="content">

                <?php $session->flash('auth'); ?>

                <?php $session->flash(); ?>

                <?php echo $content_for_layout; ?>
                
                <div class="clear"></div>
            </div>
            <div id="footer">
                <div class="footer_conteudo">
                    <div class="copy">
                        <p>© 2010 - GEIO - Todos os Direitos Reservados</p>
                    </div>
                    <div class="links_rapidos">
                        <ul>
                            <li><a href="#">Ajuda</a></li>
                            <li>|</li>
                            <li><a href="#">Suporte</a></li>
                        </ul>
                    </div>
                    <div class="fabricante">
                        <?php echo $html->image('logo_lume_footer.gif', array('alt' => 'LUME - Tecnologia em Sistemas'))?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $cakeDebug; ?>
    </body>
</html>
