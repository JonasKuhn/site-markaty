<?php

include_once '../connection.php';
include_once './sessao.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$fl_ativo = $_POST['fl_ativo'];

$diretorio_img = "./imagens/banner/";
$uploadfile = $diretorio_img . basename($_FILES['img_banner']['name']);
@$img_banner = $_FILES['img_banner']['name'];
move_uploaded_file($_FILES['img_banner']['tmp_name'], $uploadfile);

if ($fl_ativo != 'on') {
    $fl_ativo = '0';
} else {
    $fl_ativo = '1';
}

try {
    $sqlbanner = "CALL insere_banner('$titulo','$descricao','$fl_ativo','$img_banner','$cod_empresa_para_insert');";
    $cmd = $pdo->prepare($sqlbanner);
    $cmd->execute();
    unset($cmd);
    
    echo "<script>location.href='index.php?url=banner.php&msg=adc';</script>";
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