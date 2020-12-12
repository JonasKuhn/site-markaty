<?php
include_once './connection.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

$var1 = $_GET['ldl'];

$cod_catalogo = $MyCripty->dec($var1);

$selectCatalogo = "CALL sel_catalogo_especifico('$cod_catalogo');";

$queryCatalogo = $pdo->query($selectCatalogo);

$dados = $queryCatalogo->fetch();

$nome = $dados['nome'];
$descricao = $dados['descricao'];

$var1 = $MyCripty->enc($cod_catalogo);
?><div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Adicionar Novo Usuário</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=edtbd_catalogo.php&ldl=<?= $var1; ?>" enctype="multipart/form-data">
                <div class="container col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Título:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nome" value="<?= $nome; ?>" required placeholder="Digite o Título do Catálogo...">
                        </div>
                    </div>
                    <hr class="b-s-dashed">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Descrição do Catálogo:</label>
                        <div class="col-sm-12">
                            <textarea class="md-textarea form-control" name="descricao" rows="4" required placeholder="Digite uma Descrição para o Catálogo..."><?= $descricao; ?></textarea>
                        </div>
                    </div>
                </div>
                <hr class="b-s-dashed">
                <div style="display: flex;
                     flex-direction: column;
                     justify-content: center;
                     align-items: center;" >
                    <input class="col-sm-5 btn btn-dark btn-block" type="submit" onclick="return confirm('Deseja realmente editar o registro <?= $nome; ?> ?');" value="EDITAR" name="editar">
                </div>
            </form>
        </div>
    </div>
</div>