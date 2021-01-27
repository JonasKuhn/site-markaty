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

        $cmd = $pdo->prepare("CALL sel_cidade_cod('1', '$cod_ci')");
        $cmd->execute();
        $dados = $cmd->fetch();
        unset($cmd);

        $nome_cidade = $dados['nome_cidade'];
        $cep = $dados['cep'];
        $nome_estado = $dados['nome_estado'];
        $uf = $dados['uf'];
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
        <link href="css/animate.min.css" rel="stylesheet" type="text/css"/>
        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/plugins.css">
        <link rel="stylesheet" href="style.css">

        <!-- Cusom css -->
        <link rel="stylesheet" href="css/custom.css">

        <!-- Modernizer js -->
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/wow.js" type="text/javascript"></script>
    </head>
    <body>
        <!--[if lte IE 9]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- INICIO HOME -->
        <div class="wrapper" id="wrapper">
            <!-- INICIO CABECALHO -->
            <header id="wn__header" class="header__area header__absolute sticky__header">
                <div class="container-fluid" id="inicio">
                    <!-- INICIO MENU -->
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-3 col-lg-2">
                            <div class="logo">
                                <a href="?url=inicio">
                                    <img src="./intranet/imagens/logomarca/<?= $logomarca; ?>" alt="Logo Marca">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 d-none d-lg-block">
                            <nav class="mainmenu__nav ">
                                <ul class="meninmenu d-flex justify-content-end nav">
                                    <li class="drop with--one--item"><a href="?url=inicio">Início</a></li>
                                    <li class="drop with--one--item"><a href="?url=historia">História</a></li>
                                    <li class="drop with--one--item"><a href="?url=produtos">Produtos</a></li>
                                    <li class="drop with--one--item"><a href="#contato">Contato/Localização</a></li>
                                    <li class="drop with--one--item"><a href="https://api.whatsapp.com/send?phone=5549998051551&text=Seja%20Bem-Vindo!!" target="_blank">Orçamento Online</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- FIM MENU -->
                    <!-- INICIO MENU CELULAR -->
                    <div class="row d-none">
                        <div class="col-lg-12 d-none">
                            <nav class="mobilemenu__nav">
                                <ul class="meninmenu">
                                    <li><a href="?url=inicio">Início</a></li>
                                    <li><a href="?url=historia">História</a></li>
                                    <li><a href="?url=produtos">Produtos</a></li>
                                    <li><a href="#contato">Contato/Localização</a></li>
                                    <li><a href="https://api.whatsapp.com/send?phone=5549998051551&text=Seja%20Bem-Vindo!!" target="_blank">Orçamento Online</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="mobile-menu d-block d-lg-none">
                    </div>
                    <!-- FIM MENU CELULAR -->	
                </div>		
            </header>
            <!-- FIM CABECALHO -->

            <?php
            @$url = $_GET['url'];

            switch ($url) {
                ##-----------------------CASE PARA OS MENUS--------------------##
                ##-----------------------SOBRE A EMPRESA--------------------##
                case 'historia':
                    include ('./historia.php');
                    break;
                case 'produtos':
                    include ('./produtos.php');
                    break;
                case 'inicio':
                    include ('./inicio.php');
                    break;
                default :
                    include ('./inicio.php');
                    break;
            }
            ?>

            <!-- INICIO CONTATO -->
            <section id="contato" class="wn_contact_area bg--white wow fadeIn mt--30" data-wow-delay="0.5s">
                <div class="container">
                    <div class="section__title text-center">
                        <h2>CONTATO</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="contact-form-wrap">
                                <h5 style="text-align: center;" class="pb--30">Estamos sempre prontos para atender você</h5>
                                <form id="contact-form" method="POST" action="contact_me.php" enctype="multipart/form-data">
                                    <div class="single-contact-form space-between">
                                        <input type="text" name="nome" required placeholder="Nome Completo...">
                                    </div>
                                    <div class="single-contact-form space-between">
                                        <input type="email" name="email" required placeholder="Email...">
                                    </div>
                                    <div class="single-contact-form space-between">
                                        <input required type="telefone" 
                                               name="telefone" 
                                               id="tel_whatsapp" 
                                               placeholder="(11) 12345-6789">
                                    </div>
                                    <div class="single-contact-form message">
                                        <textarea required name="mensagem" placeholder="Digite sua mensagem..."></textarea>
                                    </div>
                                    <div class="contact-btn">
                                        <button type="submit">ENVIAR MENSAGEM</button>
                                    </div>
                                </form>
                                <div class="form-output pt-3">
                                    <div class="form-alert alert alert-danger alert-dismissible fade" role="alert">
                                        <p class="form-messege"></p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="wn__address">
                                <h5 class="pb--30" style="text-align: center;">Aonde nos encontrar</h5>
                                <div class="wn__addres__wreapper">
                                    <div class="ft__logo" style="text-align: center;">
                                        <a href="#">
                                            <img src="intranet/imagens/logomarca/<?= $logomarca; ?>" alt="<?= $logomarca; ?>">
                                        </a>
                                    </div>
                                    <div class="single__address">
                                        <i class="icon-location-pin icons"></i>
                                        <div class="content">
                                            <span>Endereço:</span>
                                            <p><?= $logradouro; ?>, Nr <?= $nr; ?>, <?= $bairro; ?>, <?= $nome_cidade; ?> - <?= $nome_estado; ?> / <?= $uf; ?> </p>
                                        </div>
                                    </div>
                                    <div class="single__address">
                                        <i class="icon-phone icons"></i>
                                        <div class="content">
                                            <span>Telefone:</span>
                                            <p><?= $tel_fixo; ?></p>
                                        </div>
                                    </div>
                                    <div class="single__address">
                                        <i class="icon-envelope icons"></i>
                                        <div class="content">
                                            <span>E-mail:</span>
                                            <p> <?= $email; ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <ul class="social__net--4 d-flex justify-content-center">
                                            <li><a href="<?= $facebook; ?>" target="_blank"><img src="images/facebook_icon.png" alt="Facebook" style="width: 40px;"></a></li>
                                            <li><a href="<?= $instagram; ?>" target="_blank"><img src="images/instagram_icon.png" alt="Instagram" style="width: 40px;"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </section>
            <section class="wow fadeIn mt--20" data-wow-delay="0.5s">        
                <div class="container-fluid">
                    <div class="section__title text-center">
                        <h2>LOCALIZAÇÃO</h2>
                    </div>
                    <div class="google__map ">
                        <div class="row">
                            <div id="googleMap">
                                <iframe width="100%" height="100%" src="<?= $maps; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- FIM CONTATO -->
        </div>
        <!-- INICIO RODAPE -->
        <footer id="wn__footer" class="footer__area bg__cat--5 brown--color">
            <div class="copyright__wrapper">
                <div class="container">
                    <div class="copyright" style="text-align: center;">
                        <p>Copyright <i class="fa fa-copyright"></i> <a href="?url=inicio"><?php echo $nome_fantasia; ?>. </a> Todos os direitos reservados. <?php echo date("Y"); ?></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FIM RODAPE -->  

        <!-- INICIO POPUP WPP -->
        <div class="wow slideInRight" data-wow-delay="0.5s" id="popupWpp" style="
              margin: 0 auto auto;
              position: fixed;
              right: 0;
              bottom: 20%;
              z-index: 999;
              padding-top: 20px;
              ">

            <div class="close__wrap" onclick="Mudarestado()"
                 style="
                 font-size: 24px;
                 position: absolute;
                 top: 0;
                 font-size: 24px;
                 font-weight: bold;
                 position: absolute;
                 right: 10px;
                 color: black;
                 cursor: pointer;
                 "
                 >X
            </div>
            <a id="whatsapp-pg-produto" href="https://api.whatsapp.com/send?phone=5549998051551&text=Seja%20Bem-Vindo!!" target="_blank">
                <img src="https://connectparts.vteximg.com.br/arquivos/balao-duvidas-contato-whatsapp.png?v=637245533625270000" alt="Whatsapp" title="Whatsapp">
            </a>

        </div>
        <!-- FIM POPUP WPP -->

        <script>
            function Mudarestado() {
                document.getElementById("popupWpp").style.display = 'none';
            }
        </script>

        <!-- JS Files -->

        <script src="js/vendor/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/active.js"></script>
    </body>
</html>