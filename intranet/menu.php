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
                    <i class="fa fa-fw fa-info"></i>
                    <span class="nav-link-text">Sobre a Empresa</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Banner de Destaque">
                <a class="nav-link" href="?url=banner.php">
                    <i class="fa fa-fw fa-image"></i>
                    <span class="nav-link-text">Banner de Destaque</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Qualidades da Empresa">
                <a class="nav-link" href="?url=qualidade.php">
                    <i class="fa fa-fw fa-certificate"></i>
                    <span class="nav-link-text">Qualidades da Empresa</span>
                </a>
            </li>
            
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Catálogo">
                <a class="nav-link nav-link-collapse collapsed"  data-toggle="collapse" 
                   href="#menuCatalogo" data-parent="#menuCatalogo">
                    <i class="fa fa-fw fa-book"></i>
                    <span class="nav-link-text">Catálogo</span>
                </a>
                <ul class="sidenav-second-level collapse" id="menuCatalogo">
                    <li>
                        <a href="?url=catalogo.php">Meu Catálogo</a>
                    </li>
                    <li>
                        <a href="?url=lista_produto.php">Lista de Produtos</a>
                    </li>
                    <li>
                        <a href="?url=tipo_produto.php">Tipo de Produto</a>
                    </li>
                </ul>
            </li>
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