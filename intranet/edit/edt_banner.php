<?php
include_once './connection.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

$var1 = $_GET['ldl'];

$cod_banner = $MyCripty->dec($var1);

$selectBanner = "CALL sel_banner_especifico('$cod_banner');";

$queryBanner = $pdo->query($selectBanner);

$dados = $queryBanner->fetch();

$titulo = $dados['titulo'];
$descricao = $dados['descricao'];
$img_banner = $dados['img_banner'];
$fl_ativo = $dados['fl_ativo'];

$var2 = $MyCripty->enc($fl_ativo);
?>
<div class="container col-sm-6">
    <form class="form-horizontal" method="POST" action="?url=edtbd_banner.php&ldl=<?= $var1; ?>&ldk=<?= $img_banner; ?>&ldj=<?= $var2; ?>" enctype="multipart/form-data">
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
                <img class="col-sm-6 " src="./imagens/banner/<?= $img_banner; ?>" >
                <div class="col-sm-6">
                    <label class="col-sm-6 control-label">Imagem Banner: <?= $img_banner; ?></label>
                    <input class="col-sm-6 " type="file" class="form-control" name="img_banner" placeholder="Selecione uma Imagem...">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-2 control-label">Status:</label>
            <?php if ($fl_ativo == '1') { ?>
                <input name="fl_ativo"checked type="checkbox" > ATIVADO
            <?php } else if ($fl_ativo == '2'){ ?>
                <input name="fl_ativo" type="checkbox" > DESATIVADO
            <?php } ?>
        </div>
        <hr class="b-s-dashed">
        <input class="btn btn-dark btn-block" type="submit" onclick="return editar('<?php $titulo; ?>');" value="EDITAR" name="editar">
    </form>
</div>