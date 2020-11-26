<?php
include_once './connection.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

$var1 = $_GET['ldl'];

$cod_qualidade = $MyCripty->dec($var1);

$selectQualidade = "CALL sel_qualidade_especifico('$cod_qualidade');";

$queryQualidade = $pdo->query($selectQualidade);

$dados = $queryQualidade->fetch();

$nome = $dados['nome'];
$descricao = $dados['descricao'];

$var1 = $MyCripty->enc($cod_qualidade);
?>
<div class="container col-sm-6">
    <form class="form-horizontal" method="POST" action="?url=edtbd_qualidade.php&ldl=<?= $var1; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-8 control-label">Título:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="nome" value="<?= $nome; ?>" required placeholder="Digite a Qualidade...">
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Descrição:</label>
            <div class="col-sm-12">
                <textarea class="md-textarea form-control" name="descricao" rows="4" required placeholder="Digite uma Descrição da Qualidade da Empresa..."><?= $descricao; ?></textarea>
            </div>
        </div>
        <hr class="b-s-dashed">
        <input class="btn btn-dark btn-block" type="submit" onclick="return editar('<?php $titulo; ?>');" value="EDITAR" name="editar">
    </form>
</div>