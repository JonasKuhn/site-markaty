<?php

include './encrypt.php';
include './sessao.php';
include '../connection.php';

$MyCripty = new MyCripty();

$var1 = $_GET['ldl'];
$descricao = $_POST['descricao'];

$cod_tipo = $MyCripty->dec($var1);

try {
    
    $cmd = $pdo->prepare("CALL update_tipo_produto('$cod_tipo','$descricao');");
    $cmd->execute();
    unset($cmd);
    echo "<script>location.href='index.php?url=tipo_produto.php&msg=alt';</script>";
} catch (PDOException $e) {
    echo("<br/>"
    . "<div class='container'>"
    . "<div class='row'>"
    . "<div class='col-sm-2'></div>"
    . "<div class='alert alert-danger col-sm-8' role='alert'> "
    . "Erro: %s\n" . $e->getMessage() . ""
    . "</div>"
    . "</div>"
    . "</div>");
}