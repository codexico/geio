<ul>
    <?php if ($session->read('Auth.User.group_id') == 1) : ?>

    <li><?php echo $html->link(__('List Consumidores', true), array('action' => 'index', 'controller'=>'consumidores'));?></li>
    <li><?php echo $html->link(__('New Consumidor', true), array('action' => 'add', 'controller'=>'consumidores')); ?></li>

    <li><?php echo $html->link(__('List CupomFiscais', true), array('action' => 'index', 'controller'=>'cupom_fiscais')); ?> </li>
    <li><?php echo $html->link(__('New CupomFiscal', true), array('action' => 'add', 'controller'=>'cupom_fiscais')); ?> </li>

    <li><?php echo $html->link(__('List CupomPromocionais', true), array('action' => 'index', 'controller'=>'cupom_promocionais')); ?> </li>
    <li><?php echo $html->link(__('New CupomPromocional', true), array('action' => 'add', 'controller'=>'cupom_promocionais')); ?> </li>

    <li><?php echo $html->link(__('List Funcionarios', true), array('action' => 'index', 'controller'=>'funcionarios')); ?> </li>
    <li><?php echo $html->link(__('New Funcionario', true), array('action' => 'add', 'controller'=>'funcionarios')); ?> </li>

    <li><?php echo $html->link(__('List Lojas', true), array('action' => 'index', 'controller'=>'lojas')); ?> </li>
    <li><?php echo $html->link(__('New Loja', true), array('action' => 'add', 'controller'=>'lojas')); ?> </li>

    <li><?php echo $html->link(__('List Promotores', true), array('action' => 'index', 'controller'=>'promotores')); ?> </li>
    <li><?php echo $html->link(__('New Promotor', true), array('action' => 'add', 'controller'=>'promotores')); ?> </li>

    <li><?php echo $html->link(__('List Trocas', true), array('action' => 'index', 'controller'=>'trocas')); ?> </li>
    <li><?php echo $html->link(__('New Troca', true), array('action' => 'add', 'controller'=>'trocas')); ?> </li>

    <li><?php echo $html->link(__('List Users', true), array('action' => 'index', 'controller'=>'users')); ?> </li>
    <li><?php echo $html->link(__('New User', true), array('action' => 'add', 'controller'=>'users')); ?> </li>

    <li><?php echo $html->link(__('List Usuarios', true), array('action' => 'index', 'controller'=>'usuarios')); ?> </li>
    <li><?php echo $html->link(__('New Usuario', true), array('action' => 'add', 'controller'=>'usuarios')); ?> </li>


    <?php elseif ($session->read('Auth.User.group_id') == 2) : /*usuario*/ ?>
    
    <li><?php echo $html->link(__('List Consumidores', true), array('action' => 'index', 'controller'=>'consumidores'));?></li>
    
    <li><?php echo $html->link(__('List Trocas', true), array('action' => 'index', 'controller'=>'trocas')); ?> </li>


    <?php elseif ($session->read('Auth.User.group_id') == 3) : /*promotor*/ ?>
    
    <li><?php echo $html->link(__('New Troca', true), array('action' => 'add', 'controller'=>'trocas')); ?> </li>

    
    <?php else : ?>

    
    <?php endif; ?>

</ul>