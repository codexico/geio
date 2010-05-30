<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
$javascript->link(array('premios_dia'), false);
?>
<!-- .titulo -->
<div class="titulo">
    <?php echo $html->image('bullet_titulo.gif')?>
    <h1>Brindes do dia</h1>
</div>
<div class="clear"></div>

<?php $session->flash(); ?>

<div class="trocas index">
    <div class="form">
        <form action="" >
            <?php /* echo $form->create(null, array('action'=>'dia')); */ ?>
            <div class="input select">
                <?php echo $form->day('dia', date('d'), array('class'=>'select_dia'), true); ?>
                <?php echo $form->month('mes', date('m'), array('class'=>'select_mes'), true); ?>
                <?php echo $form->year('ano', date('Y'), date('Y'), date('Y'), array('class'=>'select_ano'),false); ?>
                <?php echo $form->button('Escolher', array('id'=>'escolher-dia','class'=>'submit')); ?>
            </div>
            <?php /* echo $form->end(); */ ?>
        </form>
    </div>
</div>