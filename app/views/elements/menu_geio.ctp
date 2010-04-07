<div id="menu">
    <div class="menu-content">
        <div class="menu-abas">
            <ul>
                <li class="aba_ativa"><a href="#">SISTEMA</a></li>
                <li><a href="#">RELATÓRIOS</a></li>
                <li><a href="#">NOME DA ABA 1</a></li>
                <li><a href="#">NOME DA ABA 1</a></li>
            </ul>
        </div>

        <div class="menu-navegacao">

            <ul class="first">


                <li><?php echo $html->link('Início', '/'); ?></li>

                <?php if ($session->read('Auth.User.group_id') == 1) : ?>

                    <li><?php echo $html->link('Consumidores', array('action' => 'index', 'controller'=>'consumidores'));?></li>
                    <!-- <li><?php echo $html->link('Inserir Consumidor', array('action' => 'add', 'controller'=>'consumidores')); ?></li> -->

                    <li><?php echo $html->link('Cupons Fiscais', array('action' => 'index', 'controller'=>'cupom_fiscais')); ?> </li>
                    <!-- <li><?php echo $html->link('Inserir Cupom Fiscal', array('action' => 'add', 'controller'=>'cupom_fiscais')); ?> </li> -->

                    <!-- <li><?php echo $html->link('Cupons Promocionais', array('action' => 'index', 'controller'=>'cupom_promocionais')); ?> </li> -->
                    <li><?php /* echo $html->link('Inserir Cupom Promocional', array('action' => 'add', 'controller'=>'cupom_promocionais')); */ ?> </li>

                    <li><?php echo $html->link('Funcionários', array('action' => 'index', 'controller'=>'funcionarios')); ?> </li>
                    <li><?php echo $html->link('Inserir Funcionário', array('action' => 'add', 'controller'=>'funcionarios')); ?> </li>
            </ul>
            <ul>

                    <li><?php echo $html->link('Lojas', array('action' => 'index', 'controller'=>'lojas')); ?> </li>
                    <li><?php echo $html->link('Inserir Loja', array('action' => 'add', 'controller'=>'lojas')); ?> </li>

                    <li><?php echo $html->link('Promotores', array('action' => 'index', 'controller'=>'promotores')); ?> </li>
                    <li><?php echo $html->link('Inserir Promotor', array('action' => 'add', 'controller'=>'promotores')); ?> </li>

                    <li><?php echo $html->link('Trocas', array('action' => 'index', 'controller'=>'trocas')); ?> </li>
                    <!-- <li><?php echo $html->link('Inserir Troca', array('action' => 'nova', 'controller'=>'trocas')); ?> </li> -->
            </ul>
            <ul>
                    <li><?php echo $html->link('Users', array('action' => 'index', 'controller'=>'users')); ?> </li>
                    <!-- <li><?php echo $html->link('Inserir User', array('action' => 'add', 'controller'=>'users')); ?> </li> -->

                    <li><?php echo $html->link('Usuários', array('action' => 'index', 'controller'=>'usuarios')); ?> </li>
                    <li><?php echo $html->link('Inserir Usuario', array('action' => 'add', 'controller'=>'usuarios')); ?> </li>
            </ul>

                <?php elseif ($session->read('Auth.User.group_id') == 2) : /*usuario*/ ?>

                    <li><?php echo $html->link('Consumidores', array('action' => 'index', 'controller'=>'consumidores'));?></li>
                    <li><?php echo $html->link('Trocas', array('action' => 'index', 'controller'=>'trocas')); ?> </li>

                    <ul class="relatorios">
                        <h4>Relatórios</h4>
                        <li><?php echo $html->link('Trocas de Hoje', array('action' => 'hoje', 'controller'=>'trocas')); ?> </li>
                    </ul>
                    <br />

                <?php elseif ($session->read('Auth.User.group_id') == 3) : /*promotor*/ ?>

                    <!-- <li><?php echo $html->link('Inserir Consumidor', array('action' => 'novo', 'controller'=>'consumidores')); ?></li> -->
                    <li><?php echo $html->link('Consumidores', array('action' => 'pesquisar', 'controller'=>'consumidores')); ?></li>
                    <!-- <li><?php echo $html->link('Inserir Troca', array('action' => 'add', 'controller'=>'trocas')); ?> </li> -->

                <?php endif; ?>
            </ul>


                <?php if ($session->read('Auth.User.group_id') == 1) : ?>

                    <ul class="relatorios">
                        <li><?php echo $html->link('Trocas de Hoje', array('action' => 'hoje', 'controller'=>'trocas')); ?> </li>
                        <li><?php echo $html->link('Trocas de Ontem', array('action' => 'ontem', 'controller'=>'trocas')); ?> </li>
                        <li><?php echo $html->link('Trocas de Semana', array('action' => 'semana', 'controller'=>'trocas')); ?> </li>
                        <li><?php echo $html->link('Trocas de Mês', array('action' => 'mes', 'controller'=>'trocas')); ?> </li>
                    </ul>
                <?php endif; ?>

        </div>
    </div>
    <div class="clear"></div>
</div>