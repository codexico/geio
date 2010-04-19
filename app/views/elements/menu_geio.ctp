<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
<script>
    $(function(){
        // abas
        // oculta todas as abas
        $("div.menu-navegacao").hide();

        // mostra somente  a primeira aba
        $("div.menu-navegacao:first").show();

        // seta a primeira aba como selecionada (na lista de abas)
        $("#abas li:first").addClass("aba_ativa");

        // quando clicar no link de uma aba
        $("#abas li").click(function(){
            // oculta todas as abas
            $("div.menu-navegacao").hide();

            // tira a seleção da aba atual
            $("#abas li").removeClass("aba_ativa");

            // adiciona a classe selected na selecionada atualmente
            $(this).addClass("aba_ativa");

            // mostra a aba clicada
            $($("a", this).attr("href")).show();

            // pra nao ir para o link
            return false;
        });
    });

</script>

<div id="menu">
    <div class="menu-content">
        <div class="menu-abas">
            <ul id="abas">
                <li><a href="#aba_inicio">IN&Iacute;CIO</a></li>

                <?php if  ($session->read('Auth.User.group_id') == 1) : ?>
                <li><a href="#aba_administracao_grupo1">ADMINISTRA&Ccedil;&Atilde;O</a></li>
                <?php endif; ?>

                <?php if ($session->read('Auth.User.group_id') == 2) : ?>
                <li><a href="#aba_administracao_grupo2">ADMINISTRA&Ccedil;&Atilde;O</a></li>
                <?php endif; ?>

                <?php if ($session->read('Auth.User.group_id') == 3) : ?>
                <li><a href="#aba_pesquisa_grupo3">PESQUISAS</a></li>
                <?php endif; ?>

                <?php if ($session->read('Auth.User.group_id') != 3) : ?>
                <li><a href="#aba_mailing">MAILING</a></li>
                <li><a href="#aba_relatorios">RELAT&Oacute;RIOS</a></li>
                <?php endif; ?>

            </ul>
        </div>

        <!-- INICIO -->
        <div class="menu-navegacao" id="aba_inicio">
            <p>Colocaremos a principio alguns tópicos de ajuda e alerta como: Como utilizar este sistema, atenção durante o cadatro de consumidores, como reportar problemas, contatos úteis (telefones e emails)...</p>
        </div>

        <?php if ($session->read('Auth.User.group_id') == 1) : ?>
        <!-- ADMINISTRAÇÃO GRUPO: ADMIN -->
        <div class="menu-navegacao" id="aba_administracao_grupo1">
            <ul class="first">
                <li><?php echo $html->link('Consumidores', array('action' => 'index', 'controller'=>'consumidores'));?></li>
                <li><?php echo $html->link('Cupons Fiscais', array('action' => 'index', 'controller'=>'cupom_fiscais')); ?> </li>
                <li><?php echo $html->link('Funcionários', array('action' => 'index', 'controller'=>'funcionarios')); ?> </li>
            </ul>
            <ul>
                <li><?php echo $html->link('Lojas', array('action' => 'index', 'controller'=>'lojas')); ?> </li>
                <li><?php echo $html->link('Brindes', array('action' => 'index', 'controller'=>'brindes'));?></li>
                <li><?php echo $html->link('Trocas', array('action' => 'index', 'controller'=>'trocas')); ?> </li>
            </ul>
            <ul>
                <li><?php echo $html->link('Promotores', array('action' => 'index', 'controller'=>'promotores')); ?> </li>
                <li><?php echo $html->link('Usuários', array('action' => 'index', 'controller'=>'usuarios')); ?> </li>
                <li><?php echo $html->link('Listar todos', array('action' => 'index', 'controller'=>'users')); ?> </li>
            </ul>
        </div>
        <?php endif; ?>

        <?php if ($session->read('Auth.User.group_id') == 2) : ?>
        <!-- ADMINISTRAÇÃO GRUPO: USUARIOS -->
        <div class="menu-navegacao" id="aba_administracao_grupo2">
            <ul class="first">
                <li><?php echo $html->link('Consumidores', array('action' => 'index', 'controller'=>'consumidores'));?></li>
                <li><?php echo $html->link('Trocas', array('action' => 'index', 'controller'=>'trocas')); ?> </li>
            </ul>
        </div>
        <?php endif; ?>

        <?php if ($session->read('Auth.User.group_id') == 3) : ?>
        <!-- PESQUISA GRUPO: PROMOTORES -->
        <div class="menu-navegacao" id="aba_pesquisa_grupo3">
            <ul class="first">
                <li><?php echo $html->link('Pesquisar Consumidores', array('action' => 'pesquisar', 'controller'=>'consumidores')); ?></li>
            </ul>
        </div>
        <?php endif; ?>

        <!-- MAILING -->
        <div class="menu-navegacao" id="aba_mailing">
            <p>Já tenho conteúdo definido, mas esta parte Chico irá desenvolver durante a campanha</p>
        </div>

        <!-- RELATORIOS -->
        <div class="menu-navegacao" id="aba_relatorios">
            <ul class="first">
                <li><?php echo $html->link('Trocas de Hoje', array('action' => 'hoje', 'controller'=>'trocas')); ?> </li>
                <li><?php echo $html->link('Trocas de Ontem', array('action' => 'ontem', 'controller'=>'trocas')); ?> </li>
                <li><?php echo $html->link('Trocas da Semana', array('action' => 'semana', 'controller'=>'trocas')); ?> </li>
            </ul>
            <ul>
                <li><?php echo $html->link('Trocas do Mês', array('action' => 'mes', 'controller'=>'trocas')); ?> </li>
                <li><?php echo $html->link('Resumo Diário', array('controller'=>'resumo_diarios')); ?> </li>
                <li><?php echo $html->link('Resumo Loja', array('controller'=>'lojas', 'action'=>'resumo_diario ')); ?> </li>
            </ul>
        </div>

    </div>
    <div class="clear"></div>
</div>