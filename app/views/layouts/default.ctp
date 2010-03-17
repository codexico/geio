<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $html->charset(); ?>
        <title>
            <?php __('CakePHP: the rapid development php framework:'); ?>
            <?php echo $title_for_layout; ?>
		- <?php echo Configure::read('SITE_NAME'); ?>
        </title>
        <?php
        echo $html->meta('icon');

        echo $html->css('cake.generic');

        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1><?php echo Configure::read('SITE_NAME'); ?> - app/views/layouts/default.ctp</h1>
                <p>Olá <?php echo $session->read('Auth.User.username') . " ! " ?></p>
            </div>
            <div id="content">
                <?php $session->flash('auth'); ?>
                <?php $session->flash(); ?>

                <?php echo $content_for_layout; ?>

            </div>
            <div id="footer">
                <?php echo $html->link(
                $html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true), 'border'=>"0")),
                'http://www.cakephp.org/',
                array('target'=>'_blank'), null, false
                );
                ?>
            </div>
        </div>
        <?php echo $cakeDebug; ?>
    </body>
</html>
