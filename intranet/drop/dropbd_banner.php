<?php

include_once '../connection.php';
include_once './sessao.php';
include_once './encrypt.php';

$MyCripty = new MyCripty();
$var1 = $_GET['ldl'];
$var2 = $_GET['ldk'];
$cod_banner = $MyCripty->dec($var1);

$diretorio_img = "./imagens/banner/";
$removeimagem = $diretorio_img . $var2;

if (file_exists($removeimagem)) {
    @unlink($removeimagem);
}

try {
    $cmd = $pdo->prepare("DELETE FROM tb_banner WHERE cod_banner = '$cod_banner';");

    $cmd->execute();
    unset($cmd);

    echo "<script>location.href='index.php?url=banner.php&msg=drop';</script>";
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