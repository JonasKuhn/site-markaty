<?php
include_once './sessao.php';
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Adicionar Novo Produto</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=adcbd_produto.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="container col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-8 control-label">Nome do produto: <a style="color: red;">*Nomes de produtos devem ser diferentes*</a></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="nome" required placeholder="Digite um Nome para o Produto...">
                            </div>
                        </div>
                        <hr class="b-s-dashed">
                        <div class="form-group">
                            <label class="col-sm-8 control-label">Descrição do Produto:</label>
                            <div class="col-sm-12">
                                <textarea class="md-textarea form-control" name="descricao" rows="4" placeholder="Digite uma Descrição para o Catálogo..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-8 control-label">Imagem:</label>
                            <img class="col-sm-8 control-label">
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="img_produto" name="img_produto[]" multiple/>
                            </div>
                        </div>
                        <hr class="b-s-dashed">
                        <div class="form-group col-sm-12">
                            <label class=" control-label">Status do Cadastro:</label>
                            <input name="fl_ativo" checked type="checkbox" > ATIVADO
                        </div>

                        <hr class="b-s-dashed">
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-8 control-label" required >Catálogo:</label>
                                    <div class="col-sm-12 ">
                                        <select class="form-control" name="cod_catalogo">
                                            <option value="">Selecione um Catálogo</option>
                                            <?php
                                            include './../connection.php';

                                            $selectCatalogo = "CALL sel_catalogo();";

                                            $queryCatalogo = $pdo->query($selectCatalogo);

                                            while ($dados = $queryCatalogo->fetch()) {
                                                $nome = $dados['nome'];
                                                $cod_catalogo = $dados['cod_catalogo'];
                                                ?>
                                                <option value="<?= $cod_catalogo; ?>"><?= $cod_catalogo; ?> - <?= $nome; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-8 control-label" required >Tipo de Produto:</label>
                                    <div class="col-sm-12 ">
                                        <select class="form-control" name="cod_tipo_produto">
                                            <option value="">Selecione um Tipo de Produto</option>
                                            <?php
                                            include './../connection.php';

                                            $selectTipoProduto = "CALL sel_tipo_produto();";

                                            $queryTipoProduto = $pdo->query($selectTipoProduto);

                                            while ($dados = $queryTipoProduto->fetch()) {
                                                $descricao = $dados['descricao'];
                                                $cod_tipo_produto = $dados['cod_tipo_produto'];
                                                ?>
                                                <option value="<?= $cod_tipo_produto; ?>"><?= $cod_tipo_produto; ?> - <?= $descricao; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="b-s-dashed">
                <div class="container-fluid center-block" style="display: flex;
                     flex-direction: column;
                     justify-content: center;
                     align-items: center;">
                    <input class="col-sm-5 btn btn-dark btn-block" type="submit" onclick="return confirm('Deseja realmente salvar esse registro?');" value="SALVAR" name="salvar">
                </div>
            </form>
        </div>
    </div>
</div>