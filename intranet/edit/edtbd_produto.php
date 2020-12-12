<?php

include './encrypt.php';
include './sessao.php';
include '../connection.php';

$MyCripty = new MyCripty();

$var1 = $_GET['ldl'];

$cod_produto = $MyCripty->dec($var1);

$nome_produto = $_POST['nome'];
$descricao_produto = $_POST['descricao'];
@$fl_ativo = $_POST['fl_ativo'];
$cod_catalogo = $_POST['cod_catalogo'];
$cod_tipo_produto = $_POST['cod_tipo_produto'];
$arquivoimagens = isset($_FILES['img_produto']) ? $_FILES['img_produto'] : FALSE;

if ($fl_ativo == '') {
    $fl_ativo = '2';
} else {
    $fl_ativo = '1';
}
try {
    $selectImagensProduto = "CALL sel_imagens_produto_cod('$cod_produto');";

    $cmdd = $pdo->prepare($selectImagensProduto);
    $cmdd->execute();
    $array = $cmdd->fetchAll(PDO::FETCH_ASSOC);
    unset($cmdd);

    //selcionar o velho e comparar com novo
    $cmd = $pdo->prepare("CALL sel_produto_especifico('$cod_produto');");
    $cmd->execute();
    $dados = $cmd->fetch();
    $nome_antigo = $dados['nome'];
    unset($cmd);

    //echo "<br> Nome velho - " . $nome_antigo . "<br> Nome novo - " . $nome_produto . "<br><br>";

    $letrainicial = 97;
    foreach ($array as &$value) {
        $letrinha = chr($letrainicial);
        $cod_imagem = $value['cod_imagem'];
        $id = 'ck1' . $letrinha;
        //echo "cod imagem - " . $cod_imagem . "    identificador img - " . $id . " fl_ativo - " . @$_POST[$id] . "<br>";

        $checkImg = @$_POST[$id];


        if ($checkImg == '') {
            //echo "<br> DELETE FROM tb_produto_imagem WHERE cod_produto = '$cod_produto' AND cod_imagem = '$cod_imagem';<br>";

            $cmd = $pdo->prepare("DELETE FROM tb_produto_imagem WHERE cod_produto = '$cod_produto' AND cod_imagem = '$cod_imagem';");
            $cmd->execute();
            unset($cmd);

            $cmd = $pdo->prepare("CALL sel_imagens_cod('$cod_imagem');");
            $cmd->execute();
            $dados = $cmd->fetch();
            $nome_imagem_velha = $dados['nome'];
            unset($cmd);

            $imagem = "./imagens/produtos/" . $nome_antigo . "/" . $nome_imagem_velha;

            //echo "<br>" . $imagem . "<br>";

            unlink($imagem);
        }
        $letrainicial++;
    }


    for ($i = 0; $i < count($arquivoimagens['name']); $i++) {

        $nome_imagem_nova = $arquivoimagens['name'][$i];

        $dir = "./imagens/produtos/" . $nome_antigo . "/";

        $destino = $dir . $arquivoimagens['name'][$i];

        //echo $destino;

        if (move_uploaded_file($arquivoimagens['tmp_name'][$i], $destino)) {

            //INSERE A IMAGEM DO PRODUTO

            $sqlImagem = "CALL insere_imagem('$nome_imagem_nova','$cod_produto');";
            $cmd = $pdo->prepare($sqlImagem);
            $cmd->execute();
            unset($cmd);

            //echo "<br>" . $sqlImagem . "<br>";
        }
    }

    if ($nome_antigo != $nome_produto) {
        $diretorio_antigo = "./imagens/produtos/" . $nome_antigo . "/";
        $diretorio_novo = "./imagens/produtos/" . $nome_produto . "/";
        rename($diretorio_antigo, $diretorio_novo);
        //echo "<br> edita o nome da pasta para - " . $diretorio_novo;
        $nome_novo = $nome_produto;
    } else {
        $nome_novo = $nome_produto;
    }

    $sqlUpdateProduto = "CALL update_produto('$cod_produto', '$nome_novo', '$descricao_produto', '$fl_ativo','$cod_tipo_produto', '$cod_catalogo');";
    $cmd = $pdo->prepare($sqlUpdateProduto);
    $cmd->execute();
    unset($cmd);

    //echo "<br> " . $sqlUpdateProduto;
    echo "<script>location.href = 'index.php?url=lista_produto.php&msg=alt';</script>";
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
