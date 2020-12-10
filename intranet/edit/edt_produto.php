<?php
include_once './connection.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

$var1 = $_GET['ldl'];

$cod_produto = $MyCripty->dec($var1);

$selectProduto = "CALL sel_produto_especifico('$cod_produto');";

$cmd = $pdo->prepare($selectProduto);
$cmd->execute();
$dados = $cmd->fetch();

$nome_produto = $dados['nome'];
$descricao_produto = $dados['descricao'];
$fl_ativo = $dados['fl_ativo'];
$cod_catalogo = $dados['cod_catalogo'];
$cod_tipo_produto = $dados['cod_tipo_produto'];

unset($cmd);
?>
<div class="container col-sm-6">
    <form class="form-horizontal" method="POST" action="?url=edtbd_produto.php&ldl=<?= $var1; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-8 control-label">Nome do produto: <a style="color: red;">*Nomes de produtos devem ser diferentes*</a></label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="nome" value="<?= $nome_produto; ?>" required placeholder="Digite um Nome para o Produto...">
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Descrição do Produto:</label>
            <div class="col-sm-12">
                <textarea class="md-textarea form-control" name="descricao" rows="4" placeholder="Digite uma Descrição para o Catálogo..."><?= $descricao_produto; ?></textarea>
            </div>
        </div>    
        <hr class="b-s-dashed">
        <div class="form-group">

            <label class="col-sm-8 control-label">Imagem Existentes: <a style="color: red;">*MARQUE AS IMAGENS QUE DESEJA MANTER*</a></label>
            <div class="col-sm-12 row">
                <?php
                $selectImagensProduto = "CALL sel_imagens_produto_nome('$cod_produto');";

                $cmdd = $pdo->prepare($selectImagensProduto);
                $cmdd->execute();
                $array = $cmdd->fetchAll(PDO::FETCH_ASSOC);

                $letrainicial = 97;
                foreach ($array as &$value) {
                    $letrinha = chr($letrainicial);
                    $val = $value['nome'];
                    $id = 'ck1' . $letrinha;
                    ?>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox image-checkbox">
                            <input type="checkbox" checked="" class="custom-control-input" id="<?= $id ?>" name="<?= $id ?>">
                            <label class="custom-control-label" for="<?= $id ?>">
                                <img  src="./imagens/produtos/<?= $nome_produto; ?>/<?= $val; ?>" alt="#" class="img-fluid">
                            </label>
                        </div>
                    </div>
                    <?php
                    $letrainicial++;
                }
                ?> 
            </div>
            <br>
            <label class="col-sm-8 control-label">Carregar Novas Imagens:</label>
            <div class="col-sm-12">
                <input type="file" class="form-control" id="img_produto" name="img_produto[]" multiple/>
            </div>
        </div>

        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-2 control-label">Status:</label>
            <?php if ($fl_ativo == '1') { ?>
                <input name="fl_ativo"checked type="checkbox" > ATIVADO
            <?php } else if ($fl_ativo == '0') { ?>
                <input name="fl_ativo" type="checkbox" > DESATIVADO
            <?php } ?>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label" required >Catálogo:</label>
            <div class="col-sm-12 ">
                <select class="form-control" name="cod_catalogo">
                    <option value="">Selecione um Catálogo</option>
                    <?php
                    include './../connection.php';

                    $selectCatalogo = "CALL sel_catalogo();";

                    $queryCatalogo = $pdo->query($selectCatalogo);

                    while ($dados = $queryCatalogo->fetch()) {
                        $nome_catalogo = $dados['nome'];
                        $cod_cat = $dados['cod_catalogo'];
                        if ($cod_catalogo == $cod_cat) {
                            ?>
                            <option selected="true" value="<?= $cod_catalogo; ?>"><?= $cod_catalogo; ?> - <?= $nome_catalogo; ?></option>
                            <?php
                        } else if ($cod_catalogo != $cod_cat) {
                            ?>
                            <option value="<?= $cod_cat; ?>"><?= $cod_cat; ?> - <?= $nome_catalogo; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label" required >Tipo de Produto:</label>
            <div class="col-sm-12 ">
                <select class="form-control" name="cod_tipo_produto">
                    <option value="">Selecione um Tipo de Produto</option>
                    <?php
                    include './../connection.php';

                    $selectTipoProduto = "CALL sel_tipo_produto();";

                    $queryTipoProduto = $pdo->query($selectTipoProduto);

                    while ($dados = $queryTipoProduto->fetch()) {
                        $descricao_tipo_item = $dados['descricao'];
                        $cod_tp = $dados['cod_tipo_produto'];
                        if ($cod_tipo_produto == $cod_tp) {
                            ?>
                            <option selected="true" value="<?= $cod_tipo_produto; ?>"><?= $cod_tipo_produto; ?> - <?= $descricao_tipo_item; ?></option>
                            <?php
                        } else if ($cod_tipo_produto != $cod_tp) {
                            ?>
                            <option value="<?= $cod_tp; ?>"><?= $cod_tp; ?> - <?= $descricao_tipo_item; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <hr class="b-s-dashed">
        <input class="btn btn-dark btn-block" type="submit" onclick="return salvar();" value="SALVAR" name="salvar">
    </form>
</div>