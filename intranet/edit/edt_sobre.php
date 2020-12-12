<?php
include_once './connection.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

$var1 = $_GET['ldl'];

$cod_sobre = $MyCripty->dec($var1);

$selectSobre = "CALL sel_sobre_especifico('$cod_sobre');";

$querySobre = $pdo->query($selectSobre);

$dados = $querySobre->fetch();

$titulo = $dados['titulo'];
$descricao = $dados['descricao'];
$img_sobre = $dados['img_sobre'];
$video = $dados['video'];
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Adicionar Novo Usuário</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=edtbd_sobre.php&ldl=<?= $var1; ?>&ldk=<?= $img_sobre; ?>" enctype="multipart/form-data">
                <div class="container col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Título:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="titulo" value="<?= $titulo; ?>" required placeholder="Digite um Título...">
                        </div>
                    </div>
                    <hr class="b-s-dashed">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Descrição:</label>
                        <div class="col-sm-12">
                            <textarea class="md-textarea form-control" name="descricao" rows="4" required placeholder="Digite uma Descrição..."><?= $descricao; ?></textarea>
                        </div>
                    </div>
                    <hr class="b-s-dashed">
                    <div class="form-group">
                        <div class="col-sm-12 row">
                            <img class="col-sm-2 " src="./imagens/sobre/<?= $img_sobre; ?>" >
                            <div class="col-sm-10">
                                <label class="col-sm-4 control-label">Imagem Sobre: <?= $img_sobre; ?></label>
                                <input class="col-sm-6 " type="file" class="form-control" name="img_sobre" placeholder="Selecione Uma Imagem...">
                            </div>
                        </div>
                    </div>
                    <hr class="b-s-dashed">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Vídeo:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="video" value="<?= $video; ?>" required placeholder="Insira o Link do Vídeo...">
                        </div>
                    </div>
                </div>
                <hr class="b-s-dashed">
                <div style="display: flex;
                     flex-direction: column;
                     justify-content: center;
                     align-items: center;" >
                    <input class="col-sm-5 btn btn-dark btn-block" type="submit" onclick="return confirm('Deseja realmente editar o registro <?= $titulo; ?> ?');" value="EDITAR" name="editar">
                </div>
            </form>
        </div>
    </div>
</div>