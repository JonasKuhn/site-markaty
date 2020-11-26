<?php
include_once './sessao.php';
?>
<div class="container col-sm-6">
    <form class="form-horizontal" method="POST" action="?url=adcbd_banner.php" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-8 control-label">Título:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="titulo" required placeholder="Digite um Título...">
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Descrição:</label>
            <div class="col-sm-12">
                <textarea class="md-textarea form-control" name="descricao" rows="4" required placeholder="Digite uma Descrição..."></textarea>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Imagem:</label>
            <div class="col-sm-12">
                <input type="file" class="form-control" name="img_banner"/>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-2 control-label">Status:</label>
                <input name="fl_ativo" checked type="checkbox" > ATIVADO
        </div>
        <hr class="b-s-dashed">
        <input class="btn btn-dark btn-block" type="submit" onclick="return salvar();" value="SALVAR" name="salvar">
    </form>
</div>
