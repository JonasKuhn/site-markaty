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
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Editar Qualidade</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=edtbd_qualidade.php&ldl=<?= $var1; ?>" enctype="multipart/form-data">
                <div class="container col-sm-6">
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
                            <textarea id="edit" class="md-textarea form-control" name="descricao" rows="4" required placeholder="Digite uma Descrição da Qualidade da Empresa..."><?= $descricao; ?></textarea>
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