<?php
include_once './sessao.php';
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Adicionar Novo Sobre</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=adcbd_sobre.php" enctype="multipart/form-data">
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
                        <label class="col-sm-8 control-label">Imagem Sobre:</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" name="img_sobre" placeholder="Selecione uma Imagem Sobre a Empresa...">
                        </div>
                    </div>
                    <hr class="b-s-dashed">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Link do Vídeo:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="video"  placeholder="Insira o Link do Vídeo...">
                        </div>
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