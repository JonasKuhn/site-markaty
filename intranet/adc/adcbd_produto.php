<?php

include_once '../connection.php';
include_once './sessao.php';

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$cod_tipo_produto = $_POST['cod_tipo_produto'];
$cod_catalogo = $_POST['cod_catalogo'];
$fl_ativo = $_POST['fl_ativo'];
$arquivo = isset($_FILES['img_produto']) ? $_FILES['img_produto'] : FALSE;

if ($fl_ativo != 'on') {
    $fl_ativo = '0';
} else {
    $fl_ativo = '1';
}

//echo "NOME = " . $nome . "</br>DESCRICAO = " . $descricao . "</br>COD TIPO = " . $cod_tipo_produto .
// "</br>COD CATALOGO = " . $cod_catalogo . "</br>FL ATIVO = " . $fl_ativo . "</br></br>";

try {
    //INSERE O PRODUTO
    $sqlproduto = "CALL insere_produto('$nome','$descricao','$fl_ativo','$cod_tipo_produto','$cod_catalogo');";
    $cmd = $pdo->prepare($sqlproduto);
    $cmd->execute();
    unset($cmd);

    //echo $sqlproduto . "</br></br>";
    //INSERE O PRODUTO
    $sqlProdutoNome = "CALL sel_produto_nome('$nome');";

    $cmd = $pdo->prepare($sqlProdutoNome);
    $cmd->execute();
    $dados = $cmd->fetch();
    $cod_produto = $dados['cod_produto'];
   
    
    //echo $sqlProdutoNome . "</br></br>";
    //echo "COD PRODUTO = " . $cod_produto . "</br></br>";

    for ($i = 0; $i < count($arquivo['name']); $i++) {

        $nome_imagem = $arquivo['name'][$i];

        $novoDir = "./imagens/produtos/" . $nome . "/";

        if (is_dir($novoDir)) {
            
        } else {
            mkdir($novoDir, 0770);
            //echo "cria dir";
        }

        $destino = $novoDir . $arquivo['name'][$i];

        //echo $destino;

        if (move_uploaded_file($arquivo['tmp_name'][$i], $destino)) {

            //INSERE A IMAGEM DO PRODUTO

            $sqlImagem = "CALL insere_imagem('$nome_imagem','$cod_produto');";
            $cmd = $pdo->prepare($sqlImagem);
            $cmd->execute();
            unset($cmd);

            //echo $sqlImagem . "<br>";
        }
    }

    echo "<script>location.href='index.php?url=lista_produto.php&msg=adc';</script>";
} catch (PDOException $ex) {
    echo("<br/>"
    . "<div class='container'>"
    . "<div class='row'>"
    . "<div class='col-sm-2'></div>"
    . "<div class='alert alert-danger col-sm-8' role='alert'> "
    . "Erro: " . $ex->getMessage() . ""
    . "</div>"
    . "</div>"
    . "</div>");
}