<?php

include_once '../connection.php';
include_once './sessao.php';
include_once './encrypt.php';

$MyCripty = new MyCripty();
$var1 = $_GET['ldl'];
$cod_tipo = $MyCripty->dec($var1);

try {
    $cmd = $pdo->prepare("DELETE FROM tb_tipo_produto WHERE cod_tipo_produto = '$cod_tipo';");

    $cmd->execute();
    unset($cmd);

    echo "<script>location.href='index.php?url=tipo_produto.php&msg=drop';</script>";
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