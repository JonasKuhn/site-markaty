<?php

include './encrypt.php';
include './sessao.php';
include '../connection.php';

$MyCripty = new MyCripty();

$var1 = $_GET['ldl'];
$var2 = $_GET['ldk'];
$var3 = $_GET['ldj'];
@$fl_ativo = $_POST['fl_ativo'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];

$cod_banner = $MyCripty->dec($var1);
$fl_ativodescripto = $MyCripty->dec($var3);

$diretorio_img = "./imagens/banner/";
$uploadfile = $diretorio_img . basename($_FILES['img_banner']['name']);
$img_banner = $_FILES['img_banner']['name'];

if ($fl_ativodescripto == '1' && $fl_ativo == 'on') {
    $fl = 1;
} else if ($fl_ativodescripto == '2' && $fl_ativo == 'on') {
    $fl = 1;
} else if ($fl_ativodescripto == '2' && $fl_ativo == '') {
    $fl = 2;
} else if ($fl_ativodescripto == '1' && $fl_ativo == '') {
    $fl = 2;
}
//echo $fl. "<br>" . $fl_ativo. "<br>" . $fl_ativodescripto;
try {
    if ($img_banner != '') {
        move_uploaded_file($_FILES['img_banner']['tmp_name'], $uploadfile);

        $removeimagem = $diretorio_img . $var2;
        if (file_exists($removeimagem)) {
            @unlink($removeimagem);
        }
    } else if ($img_banner == '') {
        @$img_banner = $var2;
    }

    $sqlbanner = "CALL update_banner ('$cod_banner', '$titulo', '$descricao', '$fl', '$img_banner', '$cod_empresa_para_insert');";


    //echo $var1 . "<br>" . $var2 . "<br>" . $var3 . "<br>" . $fl_ativo . "<br>" . $titulo . "<br>" . $descricao . "<br>" . $cod_banner . "<br>" . $fl_ativodescripto . "<br>" . $fl . "<br>" . $sqlbanner;

    $cmd = $pdo->prepare("CALL update_banner ('$cod_banner', '$titulo', '$descricao', '$fl', '$img_banner', '$cod_empresa_para_insert');");
    $cmd->execute();
    unset($cmd);

    echo "<script>location.href='index.php?url=banner.php&msg=alt';</script>";
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