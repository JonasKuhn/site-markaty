<?php

include_once '../connection.php';
include_once './sessao.php';

$titulo = $_POST['titulo'];
@$descricao = $_POST['descricao'];
@$video = $_POST['video'];

$diretorio_img = "./imagens/sobre/";
$uploadfile = $diretorio_img . basename($_FILES['img_sobre']['name']);
@$img_sobre = $_FILES['img_sobre']['name'];
move_uploaded_file($_FILES['img_sobre']['tmp_name'], $uploadfile);

try {
    $sqlsobre = "CALL insere_sobre('$titulo', '$descricao', '$img_sobre', '$video', '$cod_empresa_para_insert');";

    $cmd = $pdo->prepare($sqlsobre);
    $cmd->execute();
    unset($cmd);

    echo "<script>location.href='index.php?url=sobre.php&msg=adc';</script>";
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