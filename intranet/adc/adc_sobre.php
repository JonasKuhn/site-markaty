<?php
include_once './sessao.php';
?>
<div class="container col-sm-6">
    <form class="form-horizontal" method="POST" action="?url=adcbd_sobre.php" enctype="multipart/form-data">
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
                <textarea class="md-textarea form-control" name="descricao" rows="4" required placeholder="Digite uma descrição..."></textarea>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <div class="col-sm-12 row">
                <div class="col-sm-10">
                    <label class="col-sm-4 control-label">Imagem Sobre:</label>
                    <input class="col-sm-6 " type="file" class="form-control" name="sobre" placeholder="Selecione uma imagem Sobre a Empresa...">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Vídeo:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="video" required placeholder="Digite um Título...">
            </div>
        </div>
        <hr class="b-s-dashed">
        <input class="btn btn-dark btn-block" type="submit" onclick="return salvar();" value="SALVAR" name="salvar">
    </form>
</div>