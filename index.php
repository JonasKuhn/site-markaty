<!doctype html>
<html class="no-js" lang="pt-br">
    <head>
        <?php
        include './connection.php';

        $cmd = $pdo->prepare("CALL sel_empresa_especifica('1')");
        $cmd->execute();
        $dados = $cmd->fetch();
        unset($cmd);

        $nome_fantasia = $dados['nome_fantasia'];
        $cnpj = $dados['cnpj'];
        $logradouro = $dados['logradouro'];
        $nr = $dados['nr'];
        $complemento = $dados['complemento'];
        $bairro = $dados['bairro'];
        $tel_whatsapp = $dados['tel_whatsapp'];
        $tel_fixo = $dados['tel_fixo'];
        $email = $dados['email'];
        $instagram = $dados['instagram'];
        $facebook = $dados['facebook'];
        $maps = $dados['maps'];
        $logomarca = $dados['logomarca'];
        $cod_cat = $dados['cod_catalogo'];
        $cod_ci = $dados['cod_cidade'];
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Jonas Kuhn">

        <meta property="og:url" content="www.jaboticabaeventos.com.br">
        <meta property="og:type" content="corporation">
        <!-- no type existem vários tipos article/wesite....-->
        <meta property="og:title" content="<?= $nome_fantasia; ?>">
        <meta property="og:description" content="Conheça a nossa empresa, nossas variedades de produtos e entre em contato conosco.">

        <!-- Tamanho que o FB recomenda 1200x630 máximo 5mb-->
        <meta property="og:image" content="./intranet/imagens/logomarca/<?= $logomarca; ?>">

        <title><?= $nome_fantasia; ?></title>
        <link rel="shortcut icon" href="./intranet/imagens/logomarca/<?= $logomarca; ?>" type="image/x-icon"/>

        <link rel="apple-touch-icon" href="./intranet/imagens/logomarca/<?= $logomarca; ?>">

        <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/plugins.css">
        <link rel="stylesheet" href="style.css">

        <!-- Cusom css -->
        <link rel="stylesheet" href="css/custom.css">

        <!-- Modernizer js -->
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    </head>
    <body>
        <!--[if lte IE 9]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Main wrapper -->
        <div class="wrapper" id="wrapper">

            <!-- Header -->
            <header id="wn__header" class="header__area header__absolute sticky__header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-3 col-lg-2">
                            <div class="logo">
                                <a href="#">
                                    <img src="./intranet/imagens/logomarca/<?= $logomarca; ?>" alt="Logo Marca">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 d-none d-lg-block">
                            <nav class="mainmenu__nav">
                                <ul class="meninmenu d-flex justify-content-end">
                                    <li class="drop with--one--item"><a href="#">Início</a></li>
                                    <li class="drop with--one--item"><a href="#">Sobre a Empresa</a></li>
                                    <li class="drop with--one--item"><a href="#">Produtos</a></li>
                                    <li class="drop with--one--item"><a href="#">Contato</a></li>
                                    <li class="drop with--one--item"><a href="#">Orçamento Online</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Start Mobile Menu -->
                    <div class="row d-none">
                        <div class="col-lg-12 d-none">
                            <nav class="mobilemenu__nav">
                                <ul class="meninmenu">
                                    <li><a href="#">Início</a></li>
                                    <li><a href="#">Sobre a Empresa</a></li>
                                    <li><a href="#">Produtos</a></li>
                                    <li><a href="#">Contato</a></li>
                                    <li><a href="#">Orçamento Online</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- End Mobile Menu -->
                    <div class="mobile-menu d-block d-lg-none">
                    </div>
                    <!-- Mobile Menu -->	
                </div>		
            </header>
            <!-- //Header -->

            <!-- Start Slider area -->
            <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
                <?php
                $selectBannerAtivo = "select b.* from tb_banner as b where b.fl_ativo = 1;";

                $queryBannerAtivo = $pdo->prepare($selectBannerAtivo);
                $queryBannerAtivo->execute();

                while ($dados = $queryBannerAtivo->fetch()) {
                    $tituloBanner = $dados['titulo'];
                    $descricaoBanner = $dados['descricao'];
                    $imgBanner = $dados['img_banner'];
                    ?>

                    <!-- Start Single Slide -->
                    <div class="slide animation__style10 fullscreen align__center--left" 
                         style="
                         background-image: url(intranet/imagens/banner/<?= $imgBanner; ?>);
                         background-repeat: no-repeat;
                         background-size: cover;
                         background-position: center center;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="slider__content">
                                        <div class="contentbox">
                                            <h2><?= $tituloBanner; ?></span></h2>
                                            <h2><?= $descricaoBanner; ?></h2>
                                            <h2>from <span>Here </span></h2>
                                            <a class="shopbtn" href="#">Veja Mais</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Slide -->
                    <?php
                }
                unset($cmd);
                ?>
            </div>
            <!-- Start Portfolio Area -->

            <!-- Start About Area -->
            <div class="page-about about_area bg--white mt--40 wedget__title">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__title text-center pb--30">
                                <h2>Sobre A empresa</h2>
                                <p>Conheça A Nossa História</p>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-sm-12 col-12">
                            <div class="content">
                                <div class="skill-container">
                                    <?php
                                    $cmd = $pdo->prepare("select q.* from tb_qualidade as q, tb_empresa as e "
                                            . "where q.cod_empresa = e.cod_empresa "
                                            . "order by q.nome ASC;");
                                    $cmd->execute();

                                    while ($dados = $cmd->fetch()) {
                                        $nomeQualidade = $dados['nome'];
                                        $descricaoQualidade = $dados['descricao'];
                                        ?>
                                        <!-- Start single skill -->
                                        <div class="single-skill">
                                            <h4><?= $nomeQualidade; ?></h4>
                                            <p class="mt--20 mb--20"><?= $descricaoQualidade; ?></p>
                                        </div>
                                        <!-- End single skill -->
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12 col-12">
                            <?php
                            $cmd = $pdo->prepare("select s.* from tb_sobre as s, tb_empresa as e "
                                    . "where s.cod_empresa = e.cod_empresa "
                                    . "order by s.cod_sobre ASC LIMIT 1;");
                            $cmd->execute();

                            while ($dados = $cmd->fetch()) {
                                $tituloSobre = $dados['titulo'];
                                $descricaoSobre = $dados['descricao'];
                                $imgSobre = $dados['img_sobre'];
                                $videoSobre = $dados['video'];
                                ?>
                                <div class="content thumb" style="text-align: center;">
                                    <h4 class=""><?= $tituloSobre; ?></h4>
                                    <div class="row mt--20">
                                        <div class="col-md-6">
                                            <img class="img-thumbnail" src="intranet/imagens/sobre/<?= $imgSobre; ?>" alt="<?= $imgSobre; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mt--20 mb--20" style="text-align: justify;"><?= $descricaoSobre; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End About Area -->

            <!-- Produtos -->
            <section class="wn__portfolio__area gallery__masonry__activation bg--white mt--40 pb--100">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $cmd = $pdo->prepare("select c.* from tb_empresa as e, tb_catalogo as c where e.cod_catalogo = c.cod_catalogo");
                            $cmd->execute();
                            $dados = $cmd->fetch();
                            unset($cmd);
                            $nomeCatalogo = $dados['nome'];
                            $descricaoCatalogo = $dados['descricao'];
                            ?>
                            <div class="section__title text-center">
                                <h2><?= $nomeCatalogo; ?></h2>
                                <p><?= $descricaoCatalogo; ?></p>
                            </div>
                            <div class="gallery__menu">
                                <button data-filter="*" class="is-checked">Filtrar - Todos</button>
                                <?php
                                $cmd = $pdo->prepare("select DISTINCT tp.cod_tipo_produto, tp.* "
                                        . "from tb_tipo_produto as tp, tb_produto as p, tb_catalogo_produto as cp, tb_catalogo as c, tb_empresa as e "
                                        . "where tp.cod_tipo_produto = p.cod_tipo_produto "
                                        . "and p.cod_produto = cp.cod_produto "
                                        . "and cp.cod_catalogo = c.cod_catalogo "
                                        . "and c.cod_catalogo = e.cod_catalogo "
                                        . "and p.fl_ativo = 1 "
                                        . "order by tp.cod_tipo_produto ASC;");
                                $cmd->execute();

                                $i = 1;
                                while ($dados = $cmd->fetch()) {
                                    $descricaoTipoProduto = $dados['descricao'];
                                    ?>
                                    <button data-filter=".cat--<?= $i; ?>"><?= $descricaoTipoProduto; ?></button>
                                    <?php
                                    $i++;
                                }
                                unset($cmd);
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="row masonry__wrap">
                        <!-- Start Single Portfolio -->
                        <?php
                        $cmdd = $pdo->prepare("select DISTINCT tp.cod_tipo_produto "
                                . "from tb_tipo_produto as tp, tb_produto as p, tb_catalogo_produto as cp, tb_catalogo as c, tb_empresa as e "
                                . "where tp.cod_tipo_produto = p.cod_tipo_produto "
                                . "and p.cod_produto = cp.cod_produto "
                                . "and cp.cod_catalogo = c.cod_catalogo "
                                . "and c.cod_catalogo = e.cod_catalogo "
                                . "and p.fl_ativo = 1 "
                                . "order by tp.cod_tipo_produto ASC;");
                        $cmdd->execute();
                        $arrayCodTipoProduto = $cmdd->fetchAll(PDO::FETCH_ASSOC);
                        unset($cmdd);

                        $i = 1;
                        foreach ($arrayCodTipoProduto as &$value) {
                            $codTipoProduto = $value['cod_tipo_produto'];

                            $cmd = $pdo->prepare("select p.cod_produto, p.nome as nomeproduto, p.descricao, i.nome as nomeimagem, tp.cod_tipo_produto "
                                    . "from tb_tipo_produto as tp, tb_produto as p, tb_catalogo_produto as cp, tb_catalogo as c, tb_empresa as e, tb_produto_imagem as pi, tb_imagem as i "
                                    . "where tp.cod_tipo_produto = p.cod_tipo_produto "
                                    . "and p.cod_produto = cp.cod_produto "
                                    . "and cp.cod_catalogo = c.cod_catalogo "
                                    . "and c.cod_catalogo = e.cod_catalogo "
                                    . "and p.cod_produto = pi.cod_produto "
                                    . "and pi.cod_imagem = i.cod_imagem "
                                    . "and p.fl_ativo = 1 "
                                    . "AND tp.cod_tipo_produto = '$codTipoProduto' group by p.cod_produto;");
                            $cmd->execute();

                            while ($dados = $cmd->fetch()) {
                                $codProduto = $dados['cod_produto'];
                                $nomeProduto = $dados['nomeproduto'];
                                $descricaoProduto = $dados['descricao'];
                                $codTipoProduto = $dados['cod_tipo_produto'];
                                $nomeImagemProduto = $dados['nomeimagem'];
                                ?>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--<?= $i; ?>">
                                    <div class="portfolio">
                                        <div class="thumb">
                                            <img src="./intranet/imagens/produtos/<?= $nomeProduto; ?>/<?= $nomeImagemProduto; ?>" alt="<?= $nomeImagemProduto; ?>">

                                            <div class="search">
                                                <a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal<?= $codProduto; ?>">
                                                    <i class="bi bi-search"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="thumbnail mt-2">
                                            <h6><?= $nomeProduto; ?></h6>
                                            <p>Veja mais detalhes clicando na Imagem</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- QUICKVIEW PRODUCT -->
                                <div id="quickview-wrapper">
                                    <!-- Modal -->
                                    <div class="modal fade" id="productmodal<?= $codProduto; ?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal__container" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header modal__header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-product">
                                                        <!-- Start product images -->
                                                        <div class="product-images">
                                                            <div class="main-image images">
                                                                <div class="wn__fotorama__wrapper">
                                                                    <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                                                        <?php
                                                                        $selectImagensProduto = "select i.nome from tb_produto as p, tb_produto_imagem as pi, tb_imagem as i "
                                                                                . "where p.cod_produto = pi.cod_produto "
                                                                                . "and pi.cod_imagem = i.cod_imagem "
                                                                                . "and p.cod_produto = '$codProduto';";

                                                                        $cmdd = $pdo->prepare($selectImagensProduto);
                                                                        $cmdd->execute();
                                                                        $arrayImagensProduto = $cmdd->fetchAll(PDO::FETCH_ASSOC);
                                                                        unset($cmdd);
                                                                        foreach ($arrayImagensProduto as &$value) {
                                                                            $nomeImagem = $value['nome'];
                                                                            ?>
                                                                            <a href="<?= $nomeImagem; ?>">
                                                                                <img src="./intranet/imagens/produtos/<?= $nomeProduto; ?>/<?= $nomeImagem; ?>" alt="<?= $nomeImagem; ?>">
                                                                            </a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end product images -->
                                                        <div class="product-info">
                                                            <h2><?= $nomeProduto; ?></h2>
                                                            <div class="quick-desc" style="text-align: justify;">
                                                                <?= $descricaoProduto; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END QUICKVIEW PRODUCT -->
                                <?php
                            }
                            $i++;
                        }
                        ?>
                        <!-- End Single Portfolio -->
                    </div>
                </div>
            </section>
            <!-- Fim Produtos -->

            <!-- End Portfolio Area -->
            <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
                <div class="footer-static-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer__widget footer__menu">
                                    <div class="ft__logo">
                                        <a href="index.html">
                                            <img src="images/logo/3.png" alt="logo">
                                        </a>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
                                    </div>
                                    <div class="footer__content">
                                        <ul class="social__net social__net--2 d-flex justify-content-center">
                                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                            <li><a href="#"><i class="bi bi-google"></i></a></li>
                                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                            <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                                            <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                                        </ul>
                                        <ul class="mainmenu d-flex justify-content-center">
                                            <li><a href="index.html">Trending</a></li>
                                            <li><a href="index.html">Best Seller</a></li>
                                            <li><a href="index.html">All Product</a></li>
                                            <li><a href="index.html">Wishlist</a></li>
                                            <li><a href="index.html">Blog</a></li>
                                            <li><a href="index.html">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright__wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="copyright">
                                    <div class="copy__right__inner text-left">
                                        <p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Free themes Cloud.</a> All Rights Reserved</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="payment text-right">
                                    <img src="images/icons/payment.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- //Footer Area -->            
        </div>
        <!-- //Main wrapper -->
        <a style="bottom: 10px;
           right: 10px;
           font-size: 69px;
           text-align: center;
           transition: 0.3s;
           position: fixed;" id="" href="" style="position: fixed; z-index: 2147483647;"><img src="intranet/imagens/balao-duvidas-contato-whatsapp.png"></a>
        <!-- JS Files -->
        <script src="js/vendor/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/active.js"></script>

    </body>
</html>