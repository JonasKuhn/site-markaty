<?php

include_once '../connection.php';
include_once './sessao.php';
include_once './encrypt.php';

$MyCripty = new MyCripty();
$var1 = $_GET['ldl'];
$cod_produto = $MyCripty->dec($var1);

try {

    $cmd = $pdo->prepare("select i.cod_imagem, p.nome from tb_imagem as i, tb_produto_imagem as pi, tb_produto as p "
            . "where p.cod_produto = pi.cod_produto "
            . "AND pi.cod_imagem = i.cod_imagem "
            . "AND p.cod_produto = '$cod_produto';");
    $cmd->execute();
    $array = $cmd->fetchAll(PDO::FETCH_ASSOC);


    //deletar catalogo produto
    $cmd = $pdo->prepare("DELETE FROM tb_catalogo_produto WHERE cod_produto = '$cod_produto';");
    $cmd->execute();
    unset($cmd);

    //deletar produto imagem
    $cmd = $pdo->prepare("DELETE FROM tb_produto_imagem WHERE cod_produto = '$cod_produto';");
    $cmd->execute();
    unset($cmd);

    foreach ($array as &$value) {
        $val = $value['cod_imagem'];
        //deletar imagem
        $cmd = $pdo->prepare("DELETE FROM tb_imagem WHERE cod_imagem = '$val';");
        $cmd->execute();
        unset($cmd);
        $nome_produto = $value['nome'];
    }

    $dir = "./imagens/produtos/" . $nome_produto . "/";

    $iterator = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
    $rec_iterator = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST);

    foreach ($rec_iterator as $file) {
        $file->isFile() ? unlink($file->getPathname()) : rmdir($file->getPathname());
    }

    rmdir($dir);
    
    $cmd = $pdo->prepare("DELETE FROM tb_produto WHERE cod_produto = '$cod_produto';");
    $cmd->execute();
    unset($cmd);

    echo "<script>location.href = 'index.php?url=lista_produto.php&msg=drop';</script>";
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
