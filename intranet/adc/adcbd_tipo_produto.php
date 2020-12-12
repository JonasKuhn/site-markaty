<?php

include_once '../connection.php';
include_once './sessao.php';

$descricao = $_POST['descricao'];

try {
    $sqltipoproduto = "CALL insere_tipo_produto('$descricao');";
    $cmd = $pdo->prepare($sqltipoproduto);
    $cmd->execute();
    unset($cmd);
    
    echo "<script>location.href='index.php?url=tipo_produto.php&msg=adc';</script>";
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