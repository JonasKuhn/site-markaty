<?php
include_once './connection.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

$var1 = $_GET['ldl'];

$cod_tipo = $MyCripty->dec($var1);

$selectTipo = "CALL sel_tipo_produto_especifico('$cod_tipo');";

$queryTipo = $pdo->query($selectTipo);

$dados = $queryTipo->fetch();

$descricao = $dados['descricao'];
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Editar Tipo de Produto</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=edtbd_tipo_produto.php&ldl=<?= $var1; ?>" enctype="multipart/form-data">
                <div class="container col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Título:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="<?= $descricao; ?>" name="descricao" required placeholder="Digite um Título para o Tipo de Produto...">
                        </div>
                    </div>
                </div>
                <hr class="b-s-dashed">
                <div style="display: flex;
                     flex-direction: column;
                     justify-content: center;
                     align-items: center;" >
                    <input class="col-sm-5 btn btn-dark btn-block" type="submit" onclick="return confirm('Deseja realmente editar o registro <?= $descricao; ?> ?');" value="EDITAR" name="editar">
                </div>
            </form>
        </div>
    </div>
</div>