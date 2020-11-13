<?php

include_once '../connection.php';
include_once './sessao.php';
include_once './encrypt.php';

$MyCripty = new MyCripty();
$var = $_GET['ldl'];
$cod_admin = $MyCripty->dec($var);

try {
    $cmd = $pdo->prepare("DELETE FROM tb_admin WHERE cod_admin = '$cod_admin';");
    $cmd->execute();
    unset($cmd);
    echo "<script>location.href='index.php?url=admin.php&msg=drop';</script>";
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