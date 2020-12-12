<?php
include_once './sessao.php';
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Adicionar Novo Banner</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=adcbd_banner.php" enctype="multipart/form-data">
                <div class="container col-sm-6">
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
                            <input type="file" required="" class="form-control" name="img_banner"/>
                        </div>
                    </div>
                    <hr class="b-s-dashed">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Status:</label>
                        <input name="fl_ativo" checked type="checkbox" > ATIVADO
                    </div>
                </div>
                <hr class="b-s-dashed">
                <div style="display: flex;
                     flex-direction: column;
                     justify-content: center;
                     align-items: center;" >
                    <input class="col-sm-5 btn btn-dark btn-block" type="submit" onclick="return confirm('Deseja realmente salvar esse registro?');" value="SALVAR" name="salvar">
                </div>
            </form>
        </div>
    </div>
</div>
