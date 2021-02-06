<html lang="pt-br">
    <head>
        <?php
        include './connection.php';

        $sql = "select nome_fantasia, logomarca from tb_empresa";
        $cmd = $pdo->prepare($sql);
        $cmd->execute();
        $dados = $cmd->fetch();
        $nome_fantasia = $dados['nome_fantasia'];
        $logomarca = $dados['logomarca'];
        $cod_empresa_para_insert = 1;
        ?>
        <title>Entrar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" href="./imagens/logomarca/mini_logo_markaty.png"/>
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/css/util.css">
        <link rel="stylesheet" type="text/css" href="vendor/css/main.css">
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100" 
                 style="background-image: url(imagens/banner/imagem-empresa.jpg);
                 background-repeat: no-repeat;  
                 background-attachment: fixed;
                 background-size: cover;
                 background-position: center;">
                <div class="container-login100-2">
                    <div class="wrap-login100">
                        <form class="login100-form validate-form" action="login_validation.php" method="post" target="_self" name="form" id="form">
                            <div class="login100-pic js-tilt" data-tilt>
                                <img src="./imagens/logomarca/<?= $logomarca ?>" alt="Logo Marca">
                            </div>

                            <div class="wrap-input100 validate-input" data-validate = "Digite o nome do usuário">
                                <input class="input100" class="form-control" id="login"  name="login" type="text">
                                <span class="focus-input100" data-placeholder="Usuário"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Digite a Senha">
                                <span class="btn-show-pass">
                                    <i class="zmdi zmdi-eye"></i>
                                </span>
                                <input class="input100" class="form-control" id="senha"  name="senha" type="password">
                                <span class="focus-input100" data-placeholder="Senha"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button type="submit" class="login100-form-btn">
                                        Login
                                    </button>
                                </div>
                            </div>
                            <?php
                            @$msg = $_GET['msg'];
                            if (isset($msg) && $msg != false && $msg == "aut") {
                                echo "<br/><div class='alert alert-danger' style='text-align: center;' role='alert'>Autenticação necessária</div>";
                            }
                            if (isset($msg) && $msg != false && $msg == "bad_aut") {
                                echo "<br/><div class='alert alert-danger' style='text-align: center;' role='alert'>Login ou senha incorretos</div>";
                            }
                            if (isset($msg) && $msg != false && $msg == "empty") {
                                echo "<br/><div class='alert alert-danger' style='text-align: center;' role='alert'>Todos os campos devem ser preenchidos</div>";
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            });
        </script>
    </body>
</html>