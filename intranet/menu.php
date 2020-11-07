<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="?$url=home.php"><?=$_SESSION['nome'];?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Painel de Controle">
                <a class="nav-link" href="?$url=home.php">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Painel de Controle</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Empresa">
                <a class="nav-link" href="?url=empresa.php">
                    <i class="fa fa-fw fa-building"></i>
                    <span class="nav-link-text">Empresa</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sobre a Empresa">
                <a class="nav-link" href="?url=sobre.php">
                    <i class="fa fa-fw fa-history"></i>
                    <span class="nav-link-text">Sobre a Empresa</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Banner">
                <a class="nav-link" href="?url=banner.php">
                    <i class="fa fa-fw fa-suitcase"></i>
                    <span class="nav-link-text">Banner</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Qualidade">
                <a class="nav-link" href="?url=qualidade.php">
                    <i class="fa fa-fw fa-phone"></i>
                    <span class="nav-link-text">Qualidades da Empresa</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Banners">
                <a class="nav-link" href="?url=banner.php">
                    <i class="fa fa-fw fa-image"></i>
                    <span class="nav-link-text">Banners</span>
                </a>
            </li>
            
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Catálogo">
                <a class="nav-link nav-link-collapse collapsed"  data-toggle="collapse" 
                   href="#menuCardapio" data-parent="#menuCardapio">
                    <i class="fa fa-fw fa-cutlery"></i>
                    <span class="nav-link-text">Cardápio</span>
                </a>
                <ul class="sidenav-second-level collapse" id="menuCardapio">
                    <li>
                        <a href="?url=lista_cardapio.php">Lista de Cardápios</a>
                    </li>
                    <li>
                        <a href="?url=itens_cardapio.php">Itens Cardápio</a>
                    </li>
                </ul>
            </li>
            <!--
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Planos Tim">
                <a class="nav-link nav-link-collapse collapsed"  data-toggle="collapse" 
                   href="#menuProg" data-parent="?url=tim.php">
                    <i class="fa fa-fw fa-phone"></i>
                    <span class="nav-link-text">Programação</span>
                </a>
                <ul class="sidenav-second-level collapse" id="menuProg">
                    <li>
                        <a href="#">Item da Programação</a>
                    </li>
                    <li>
                        <a href="#">Tipos de Programação</a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="">
                <a class="nav-link" href="?url=catalogo.php">
                    <i class="fa fa-fw fa-phone-square"></i>
                    <span class="nav-link-text">Catálogo</span>
                </a>
            </li>
            -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuários">
                <a class="nav-link" href="?url=admin.php">
                    <i class="fa fa-fw fa-user-circle"></i>
                    <span class="nav-link-text">Usuários</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#sairModal">
                    <i class="fa fa-fw fa-sign-out"></i>Sair</a>
            </li>
        </ul>
    </div>
</nav>