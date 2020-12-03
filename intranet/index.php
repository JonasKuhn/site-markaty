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
    <script>
        function naoexcluir() {
            return confirm('Não é possível apagar esse item!');
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

    $cod_empresa_para_insert = 1;
    ?>
</head>
<!-- ---------------------CORPO PRINCIPAL------------------ -->
<!-- RESPONSAVEL POR DEIXAR O MENU RECOLHIDO sidenav-toggled -->
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
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

            case 'edt_empresa.php':
                $menu = 'Editar Empresa';
                include './navegacao.php';
                include ('./edit/edt_empresa.php');
                break;

            case 'edtbd_empresa.php':
                include ('./edit/edtbd_empresa.php');
                break;

            ##-----------------------SOBRE--------------------##
            case 'sobre.php':
                $menu = 'Sobre a Empresa';
                include './navegacao.php';
                include ('./sobre.php');
                break;
            case 'adc_sobre.php':
                $menu = 'Adicionar Sobre';
                include './navegacao.php';
                include ('./adc/adc_sobre.php');
                break;
            case 'adcbd_sobre.php':
                include ('./adc/adcbd_sobre.php');
                break;
            case 'edt_sobre.php':
                $menu = '<a href="?url=sobre.php">Sobre a Empresa </a> / Editar Sobre';
                include './navegacao.php';
                include ('./edit/edt_sobre.php');
                break;
            case 'edtbd_sobre.php':
                include ('./edit/edtbd_sobre.php');
                break;
            case 'dropbd_sobre.php':
                include ('./drop/dropbd_sobre.php');
                break;

            ##-----------------------BANNER--------------------##
            case 'banner.php':
                $menu = 'Banner de Destaque';
                include './navegacao.php';
                include ('./banner.php');
                break;
            case 'adc_banner.php':
                $menu = 'Adicionar Banner';
                include './navegacao.php';
                include ('./adc/adc_banner.php');
                break;
            case 'adcbd_banner.php':
                include ('./adc/adcbd_banner.php');
                break;
            case 'dropbd_banner.php':
                include ('./drop/dropbd_banner.php');
                break;
            case 'edt_banner.php':
                $menu = '<a href="?url=banner.php">Banner de Destaque </a> / Editar Banner';
                include './navegacao.php';
                include ('./edit/edt_banner.php');
                break;
            case 'edtbd_banner.php':
                include ('./edit/edtbd_banner.php');
                break;

            ##-----------------------QUALIDADE--------------------##
            case 'qualidade.php':
                $menu = 'Qualidades da Empresa';
                include './navegacao.php';
                include ('./qualidade.php');
                break;
            case 'adc_qualidade.php':
                $menu = 'Adicionar Qualidade da Empresa';
                include './navegacao.php';
                include ('./adc/adc_qualidade.php');
                break;
            case 'adcbd_qualidade.php':
                include ('./adc/adcbd_qualidade.php');
                break;
            case 'dropbd_qualidade.php':
                include ('./drop/dropbd_qualidade.php');
                break;
            case 'edt_qualidade.php':
                $menu = '<a href="?url=qualidade.php">Qualidades da Empresa </a> / Editar Qualidade';
                include './navegacao.php';
                include ('./edit/edt_qualidade.php');
                break;
            case 'edtbd_qualidade.php':
                include ('./edit/edtbd_qualidade.php');
                break;
            ##-----------------------CATALOGO--------------------##
            case 'catalogo.php':
                $menu = 'Meu Catálogo';
                include './navegacao.php';
                include ('./catalogo.php');
                break;
            case 'adc_catalogo.php':
                $menu = 'Adicionar Catálogo';
                include './navegacao.php';
                include ('./adc/adc_catalogo.php');
                break;
            case 'adcbd_catalogo.php':
                include ('./adc/adcbd_catalogo.php');
                break;
            case 'dropbd_catalogo.php':
                include ('./drop/dropbd_catalogo.php');
                break;
            case 'edt_catalogo.php':
                $menu = '<a href="?url=catalogo.php">Meu Catálogo </a> / Editar Catálogo';
                include './navegacao.php';
                include ('./edit/edt_catalogo.php');
                break;
            case 'edtbd_catalogo.php':
                include ('./edit/edtbd_catalogo.php');
                break;

            ##-----------------------LISTA DE PRODUTOS--------------------##
            case 'lista_produto.php':
                $menu = 'Lista De Produto';
                include './navegacao.php';
                include ('./lista_produto.php');
                break;
            case 'adc_produto.php':
                $menu = '<a href="?url=lista_produto.php">Lista De Produto </a> / Adicionar Novo Produto';
                include './navegacao.php';
                include ('./adc/adc_produto.php');
                break;
            case 'adcbd_produto.php':
                include ('./adc/adcbd_produto.php');
                break;
            case 'dropbd_produto.php':
                include ('./drop/dropbd_produto.php');
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
              ` */

            ##-----------------------TIPO DE PRODUTO----------------------##
            case 'tipo_produto.php':
                $menu = 'Tipo de Produto';
                include './navegacao.php';
                include ('./tipo_produto.php');
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
              ` */

            ##-----------------------ADMIN--------------------##
            case 'admin.php':
                $menu = 'Usuários';
                include './navegacao.php';
                include ('./admin.php');
                break;
            case 'adc_admin.php':
                $menu = 'Adicionar Usuário';
                include './navegacao.php';
                include ('./adc/adc_admin.php');
                break;
            case 'adcbd_admin.php':
                include ('./adc/adcbd_admin.php');
                break;
            case 'dropdb_admin.php':
                include ('./drop/dropbd_admin.php');
                break;
            case 'edt_admin.php':
                $menu = '<a href="?url=admin.php">Usuários </a> / Editar Usuário';
                include './navegacao.php';
                include ('./edit/edt_admin.php');
                break;
            case 'edtbd_admin.php':
                include ('./edit/edtbd_admin.php');
                break;
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
                    <small>Copyright © <?php echo $nome_fantasia; ?> <?php echo date("Y"); ?></small>
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
        <script src="vendor/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
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

        <!-- RESPONSAVEL POR FAZER APARECER E SUMIR A SENHA NO CAMPO SENHA -->
        <script>
            jQuery
            // Check javascript has loaded
            $(document).ready(function () {
                // Click event of the showPassword button
                $('#showPassword').on('click', function () {
                    // Get the password field
                    var passwordField = $('#password');
                    // Get the current type of the password field will be password or text
                    var passwordFieldType = passwordField.attr('type');
                    // Check to see if the type is a password field
                    if (passwordFieldType == 'password') {
                        // Change the password field to text
                        passwordField.attr('type', 'text');
                        // Change the Text on the show password button to Hide
                        $(this).removeClass('fa-eye').addClass('fa-eye-slash');
                    } else {
                        // If the password field type is not a password field then set it to password
                        passwordField.attr('type', 'password');
                        // Change the value of the show password button to Show
                        $(this).removeClass('fa-eye-slash').addClass('fa-eye');
                    }
                });
            });
        </script>
        <script type="text/javascript">$("#tel_whatsapp").mask("(99) 99999-9999");</script>
        <script type="text/javascript">$("#tel_fixo").mask("(99) 9999-9999");</script>
        <script type="text/javascript">
            function cnpj(v) {
                v = v.replace(/\D/g, "")                           //Remove tudo o que não é dígito
                v = v.replace(/^(\d{2})(\d)/, "$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
                v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
                v = v.replace(/\.(\d{3})(\d)/, ".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
                v = v.replace(/(\d{4})(\d)/, "$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
                return v
            }
        </script>
        <script type="text/javascript">$("#cep").mask("99999-999");</script>
    </div>
</body>