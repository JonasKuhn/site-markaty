<?php
include_once './sessao.php';
?>
<div class="container col-sm-6">
    <form class="form-horizontal" method="POST" action="?url=adcbd_qualidade.php" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-8 control-label">Qualidade:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="nome" required placeholder="Digite a Qualidade...">
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Descrição da Qualidade:</label>
            <div class="col-sm-12">
                <textarea class="md-textarea form-control" name="descricao" rows="4" placeholder="Digite uma Descrição da Qualidade da Empresa..."></textarea>
            </div>
        </div>
        <hr class="b-s-dashed">
        <input class="btn btn-dark btn-block" type="submit" onclick="return salvar();" value="SALVAR" name="salvar">
    </form>
</div>