<?php

include_once '../connection.php';
include_once './sessao.php';

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];

try {
    $sqladmin = "CALL insere_admin('$login', '$senha', '$nome', '$cod_empresa_para_insert');";

    $cmd = $pdo->prepare($sqladmin);
    $cmd->execute();

    unset($cmd);

    $sqlSelectAdmin = "SELECT login FROM tb_admin WHERE senha = '$senha';";
    
    $querySelectAdmin = $pdo->query($sqlSelectAdmin);

    while ($dados = $querySelectAdmin->fetch()) {
        $login = $dados['login'];
    }
    
    if ($login != null){
        echo "<script>location.href='index.php?url=adc_admin.php&msg=logexist';</script>";
    } else {
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