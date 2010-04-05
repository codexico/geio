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
                    <a href="../index.php"><?php echo $html->image('logotipo_geio.jpg', array('alt' => 'GEIO - Início'))?></a>
                </div>
                <div class="painel_logado">
                    <h5><?php echo $html->link(__('LOGIN', true), '/login'); ?></h5>
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


            <div id="content">
                <?php echo $content_for_layout; ?>
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
                        <?php echo $html->image('logo_geio_footer.gif', array('alt' => 'GEIO'))?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $cakeDebug; ?>
    </body>
</html>
