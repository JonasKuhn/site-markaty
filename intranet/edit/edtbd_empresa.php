<?php

include './encrypt.php';
include './sessao.php';
include '../connection.php';

$MyCripty = new MyCripty();

$var = $_GET['ldl'];
$var2 = $_GET['ldk'];

$cod_empresa = $MyCripty->dec($var);

$diretorio_img = "./imagens/logomarca/";
$uploadfile = $diretorio_img . basename($_FILES['logomarca']['name']);
$nome_logo = $_FILES['logomarca']['name'];

if ($nome_logo != '') {
    move_uploaded_file($_FILES['logomarca']['tmp_name'], $uploadfile);

    $removeimagem = $diretorio_img . $var2;

    if (file_exists($removeimagem)) {
        unlink($removeimagem);
    }
} else if ($nome_logo == '') {
    @$nome_logo = $var2;
}

$nome_fantasia = trim($_POST['nome_fantasia']);
$cnpj = trim($_POST['cnpj']);
$logradouro = trim($_POST['logradouro']);
$nr = trim($_POST['nr']);
$complemento = trim($_POST['complemento']);
$bairro = trim($_POST['bairro']);
$tel_whatsapp = trim($_POST['tel_whatsapp']);
$tel_fixo = trim($_POST['tel_fixo']);
$email = trim($_POST['email']);
$instagram = trim($_POST['instagram']);
$facebook = trim($_POST['facebook']);
$maps = trim($_POST['maps']);
$cod_cat = trim($_POST['cod_catalogo']);
$cod_ci = trim($_POST['cod_cidade']);

try {
//    $test = "CALL update_empresa('$cod_empresa', '$nome_fantasia','$cnpj','$logradouro','$nr',"
//            . "'$complemento','$bairro','$tel_whatsapp','$tel_fixo','$email','$instagram','$facebook','$maps',"
//            . "'$nome_logo','$cod_cat','$cod_ci');";
//    echo $test;
    
    $cmd = $pdo->prepare("CALL update_empresa('$cod_empresa', '$nome_fantasia','$cnpj','$logradouro','$nr',"
            . "'$complemento','$bairro','$tel_whatsapp','$tel_fixo','$email','$instagram','$facebook','$maps',"
            . "'$nome_logo','$cod_cat','$cod_ci');");
    $cmd->execute();
    unset($cmd);
    echo "<script>location.href='index.php?url=empresa.php&msg=alt';</script>";
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