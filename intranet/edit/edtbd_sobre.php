<?php

include './encrypt.php';
include './sessao.php';
include '../connection.php';

$MyCripty = new MyCripty();

$var = $_GET['ldl'];
$var2 = $_GET['ldk'];

$cod_sobre = $MyCripty->dec($var);

$diretorio_img = "./imagens/sobre/";
$uploadfile = $diretorio_img . basename($_FILES['img_sobre']['name']);
$img_sobre = $_FILES['img_sobre']['name'];

if ($img_sobre != '') {
    move_uploaded_file($_FILES['img_sobre']['tmp_name'], $uploadfile);

    $removeimagem = $diretorio_img . $var2;
    if (file_exists($removeimagem)) {
        @unlink($removeimagem);
    }
} else if ($img_sobre == '') {
    @$img_sobre = $var2;
}

$titulo = trim($_POST['titulo']);
$descricao = trim($_POST['descricao']);
$video = trim($_POST['video']);

try {
    $cmd = $pdo->prepare("CALL update_sobre('$cod_sobre', '$titulo', '$descricao', '$img_sobre', '$video', '$cod_empresa_para_insert');");
    $cmd->execute();
    unset($cmd);
    
    echo "<script>location.href='index.php?url=sobre.php&msg=alt';</script>";
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