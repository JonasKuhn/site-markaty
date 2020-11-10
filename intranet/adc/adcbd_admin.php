<?php

include_once '../connection.php';
include_once './sessao.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$fl_ativo = $_POST['fl_ativo'];

try {
    if ($_FILES['img'] != '') {
        $diretorio_img = "../img/banner/";
        $uploadfile = $diretorio_img.basename($_FILES['img']['name']);
        $nome = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
    }
       
    $cod_loja = '1';
    
    if($fl_ativo != 'on'){
        $fl_ativo = '0';
    }else{
        $fl_ativo = '1';
    }
    
    try {
        $cmd = $pdo->prepare("INSERT INTO tb_banner(titulo, descricao, img, fl_ativo, cod_loja ) "
                . "VALUES ('$titulo','$descricao', '$nome','$fl_ativo', '$cod_loja');");
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