<?php

include_once '../connection.php';
include_once './sessao.php';
include_once './encrypt.php';

$MyCripty = new MyCripty();
$var1 = $_GET['ldl'];
$cod_qualidade = $MyCripty->dec($var1);

try {
    $cmd = $pdo->prepare("DELETE FROM tb_qualidade WHERE cod_qualidade = '$cod_qualidade';");

    $cmd->execute();
    unset($cmd);

    echo "<script>location.href='index.php?url=qualidade.php&msg=drop';</script>";
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