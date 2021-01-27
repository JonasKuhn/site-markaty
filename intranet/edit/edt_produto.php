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
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Editar Dados do Produto</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=edtbd_produto.php&ldl=<?= $var1; ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="container col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Nome do produto: <a style="color: red;">*Nomes de produtos devem ser diferentes*</a></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="nome" value="<?= $nome_produto; ?>" required placeholder="Digite um Nome para o Produto...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Descrição do Produto:</label>
                            <div class="col-sm-12">
                                <textarea id="edit" class="md-textarea form-control" name="descricao" rows="4" placeholder="Digite uma Descrição para o Catálogo..."><?=$descricao_produto;?></textarea>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-11">
                                <label>Status do Cadastro:</label>
                                <?php if ($fl_ativo == '1') { ?>
                                    <input  name="fl_ativo"checked type="checkbox" > 
                                    <label > ATIVADO </label>
                                <?php } else if ($fl_ativo == '2') { ?>
                                    <input  name="fl_ativo" type="checkbox" > 
                                    <label> DESATIVADO </label>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6 control-label">
                                    <label class="col-sm-8 control-label" required >Catálogo:</label>
                                    <div class="col-sm-12 ">
                                        <select class="form-control" name="cod_catalogo">
                                            <option value="">Selecione um Catálogo</option>
                                            <?php
                                            include './../connection.php';

                                            $selectCatalogo = "CALL sel_catalogo();";

                                            $cmd = $pdo->prepare($selectCatalogo);
                                            $cmd->execute();

                                            while ($dados = $cmd->fetch()) {
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
                                <div class="form-group col-sm-6 control-label">
                                    <label class="col-sm-12 control-label" required >Tipo de Produto:</label>
                                    <div class="col-sm-12 ">
                                        <select class="form-control" name="cod_tipo_produto">
                                            <option value="">Selecione um Tipo de Produto</option>
                                            <?php
                                            include './../connection.php';

                                            $selectTipoProduto = "CALL sel_tipo_produto();";
                                            $cmd = $pdo->prepare($selectTipoProduto);
                                            $cmd->execute();

                                            while ($dados = $cmd->fetch()) {
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
                                            unset($cmd);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Imagem Existentes: <a style="color: red;">*MARQUE AS IMAGENS QUE DESEJA MANTER*</a></label>
                            <div class="col-sm-12">
                                <div class="row">
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
                                                    <img  src="./imagens/produtos/<?= $nome_produto; ?>/<?= $val; ?>" alt="<?= $nome_produto; ?>" class="img-fluid">
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                        $letrainicial++;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label">Carregar Novas Imagens:</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="img_produto" name="img_produto[]" multiple/>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="b-s-dashed">
                <div class="container-fluid center-block" style="display: flex;
                     flex-direction: column;
                     justify-content: center;
                     align-items: center;">
                    <input class="col-sm-5 btn btn-dark btn-block" type="submit" onclick="return confirm('Deseja realmente editar o registro <?= $nome_produto; ?> ?');" value="SALVAR" name="salvar">
                </div>
            </form>
        </div>
    </div>
</div>