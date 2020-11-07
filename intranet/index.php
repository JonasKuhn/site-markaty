<?php
require_once './sessao.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../img/marca/marca-icone.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Jonas Kuhn">
    <meta property="og:url" content="www.sassoinformatica.com.br/intranet/index.php">
    <meta property="og:title" content="Dashboard">
    <meta property="og:description" content="Painel de Controle">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/fonts/awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/css/sb-admin.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/bootstrap/css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css"/>
    <script>
        function excluir(valor) {
            return confirm('Deseja realmente excluir o registro \n' + valor + '?');
        }
    </script>
    <script>
        function editar(valor) {
            return confirm('Deseja realmente editar o registro \n' + valor + '?');
        }
    </script>
    <script>
        function salvar() {
            return confirm('Os dados informados estão corretos?');
        }
    </script>

    <?php
    include '../connection.php';
    $sql = "select nome_fantasia from tb_empresa";
    $r = $pdo->query($sql);
    foreach ($r as $row) {
        $nome_fantasia = $row["nome_fantasia"];
        ?>
        <title>Dashboard - <?= $nome_fantasia; ?></title>
        <?php
    }
    ?>
</head>
<!-- ---------------------CORPO PRINCIPAL------------------ -->
<!-- RESPONSAVEL POR DEIXAR O MENU RECOLHIDO sidenav-toggled -->
<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
    <!-- Menu -->
    <?php include './menu.php'; ?>

    <div class="content-wrapper">
        <?php
        @$url = $_GET['url'];

        switch ($url) {
            ##-----------------------CASE PARA OS MENUS--------------------##
            case 'home.php':
                $menu = 'Home';
                include './navegacao.php';
                include ('./home.php');
                break;
            
            
            ##-----------------------LOJA--------------------##
            case 'empresa.php':
                $menu = 'Empresa';
                include './navegacao.php';
                include ('./empresa.php');
                break;
            /*
            case 'edtloja.php':
                $menu = 'Editar Loja';
                include './navegacao.php';
                include ('./edit/loja/edtloja.php');
                break;
            case 'edtbdloja.php':
                include ('./edit/loja/edtbdloja.php');
                break;
`           */
            
            ##-----------------------SOBRE--------------------##
            case 'sobre.php':
                $menu = 'Sobre a Empresa';
                include './navegacao.php';
                include ('./sobre.php');
                break;
            /*
            case 'edtloja.php':
                $menu = 'Editar Loja';
                include './navegacao.php';
                include ('./edit/loja/edtloja.php');
                break;
            case 'edtbdloja.php':
                include ('./edit/loja/edtbdloja.php');
                break;
`           */
            
            ##-----------------------BANNER--------------------##
            case 'banner.php':
                $menu = 'Banner';
                include './navegacao.php';
                include ('./banner.php');
                break;
            /*
            case 'edtloja.php':
                $menu = 'Editar Loja';
                include './navegacao.php';
                include ('./edit/loja/edtloja.php');
                break;
            case 'edtbdloja.php':
                include ('./edit/loja/edtbdloja.php');
                break;
`           */
            
            ##-----------------------QUALIDADE--------------------##
            case 'qualidade.php':
                $menu = 'Qualidade';
                include './navegacao.php';
                include ('./qualidade.php');
                break;
            /*
            case 'edtloja.php':
                $menu = 'Editar Loja';
                include './navegacao.php';
                include ('./edit/loja/edtloja.php');
                break;
            case 'edtbdloja.php':
                include ('./edit/loja/edtbdloja.php');
                break;
`           */
            
            ##-----------------------CATALOGO--------------------##
            case 'catalogo.php':
                $menu = 'Catálogo';
                include './navegacao.php';
                include ('./catalogo.php');
                break;
            /*
            case 'edtloja.php':
                $menu = 'Editar Loja';
                include './navegacao.php';
                include ('./edit/loja/edtloja.php');
                break;
            case 'edtbdloja.php':
                include ('./edit/loja/edtbdloja.php');
                break;
`           */
            
            ##-----------------------ADMIN--------------------##
            case 'admin.php':
                $menu = 'Usuários';
                include './navegacao.php';
                include ('./admin.php');
                break;
            /*
            case 'edtloja.php':
                $menu = 'Editar Loja';
                include './navegacao.php';
                include ('./edit/loja/edtloja.php');
                break;
            case 'edtbdloja.php':
                include ('./edit/loja/edtbdloja.php');
                break;
`           */

            default :
                $menu = 'Home';
                include './navegacao.php';
                include ('./home.php');
        }
        ?>

        <!-- Rodapé -->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © <?= $nome_fantasia; ?> 2019</small>
                </div>
            </div>
        </footer>

        <!-- Botão para subir ao topo -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>

        <!-- Sair Modal-->
        <?php include './home_modal.php'; ?>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js" type="text/javascript"></script>
        <script src="vendor/chart.js/Chart.min.js" type="text/javascript"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js" type="text/javascript"></script>
        <script src="vendor/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="vendor/js/sb-admin.min.js" type="text/javascript"></script>
        <script src="vendor/js/sb-admin-datatables.min.js" type="text/javascript"></script>
        <script src="vendor/js/sb-admin-charts.min.js" type="text/javascript"></script>
        <script src="vendor/jquery/jquery.maskMoney.js" type="text/javascript"></script>
        <script src="vendor/jquery/jquery.mask.min.js" type="text/javascript"></script>
        <script src="vendor/bootstrap/js/bootstrap-toggle.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(function () {
            $("#valor").maskMoney({symbol: '',
                showSymbol: true, thousands: '.', decimal: '.', symbolStay: true});
        });
        </script>
        <script>
            function somenteNumeros(num) {
                var er = /[^0-9.]/;
                er.lastIndex = 0;
                var campo = num;
                if (er.test(campo.value)) {
                    campo.value = "";
                }
            }
        </script>
        <script type="text/javascript">$("#tel_celular").mask("(99) 99999-9999");</script>
        <script type="text/javascript">$("#tel_fixo").mask("(99) 9999-9999");</script>
        <script type="text/javascript">$("#cnpj").mask("99.999.999/9999-99");</script>
        <script type="text/javascript">$("#cep").mask("99999-999");</script>
    </div>
</body>