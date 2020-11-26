<?php

include_once '../connection.php';
include_once './sessao.php';

$nome = $_POST['nome'];
@$descricao = $_POST['descricao'];

try {
    $sqlcatalogo = "CALL insere_catalogo('$nome', '$descricao');";

    $cmd = $pdo->prepare($sqlcatalogo);
    $cmd->execute();
    unset($cmd);

    echo "<script>location.href='index.php?url=catalogo.php&msg=adc';</script>";
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
