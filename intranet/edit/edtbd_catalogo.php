<?php

include './encrypt.php';
include './sessao.php';
include '../connection.php';

$MyCripty = new MyCripty();

$var = $_GET['ldl'];
$cod_catalogo = $MyCripty->dec($var);

$nome = trim($_POST['nome']);
$descricao = trim($_POST['descricao']);

try {
    $sqlcatalogo = "CALL update_catalogo('$cod_catalogo', '$nome', '$descricao','$cod_empresa_para_insert');";
    $cmd = $pdo->prepare($sqlcatalogo);
    $cmd->execute();
    unset($cmd);
    
    echo "<script>location.href='index.php?url=catalogo.php&msg=alt';</script>";
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