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
?>
<div class="container col-sm-6">
    <form class="form-horizontal" method="POST" action="?url=edtbd_catalogo.php&ldl=<?= $var1; ?>" enctype="multipart/form-data">
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
        <hr class="b-s-dashed">
        <input class="btn btn-dark btn-block" type="submit" onclick="return editar('<?php $titulo; ?>');" value="EDITAR" name="editar">
    </form>
</div>