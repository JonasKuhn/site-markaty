<?php

include_once '../connection.php';
include_once './sessao.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];

try {
    $senha_crypt = $MyCripty->enc($senha);

    $sqlSelectAdmin = "SELECT login FROM tb_admin WHERE login = '$login';";

    $querySelectAdmin = $pdo->query($sqlSelectAdmin);

    while ($dados = $querySelectAdmin->fetch()) {
        $login_verifica = $dados['login'];
    }

    if (@$login_verifica != null) {
        echo "<script>location.href='index.php?url=admin.php&msg=logexist';</script>";
    } else {
        $sqladmin = "CALL insere_admin('$login', '$senha_crypt', '$nome', '$cod_empresa_para_insert');";

        $cmd = $pdo->prepare($sqladmin);
        $cmd->execute();

        unset($cmd);
        
        echo "<script>location.href='index.php?url=admin.php&msg=adc';</script>";
    }
} catch (PDOException $ex) {
    echo("<br/>"
    . "<div class='container'>"
    . "<div class='row'>"
    . "<div class='col-sm-2'></div>"
    . "<div class='alert alert-danger col-sm-8' role='alert'> "
    . "Erro: %s\n" . $ex->getMessage() . ""
    . "</div>"
    . "</div>"
    . "</div>");
}