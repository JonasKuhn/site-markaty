<?php
include_once './sessao.php';
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Adicionar Nova Qualidade</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=adcbd_qualidade.php" enctype="multipart/form-data">
                <div class="container col-sm-8">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Qualidade:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nome" required placeholder="Digite a Qualidade...">
                        </div>
                    </div>
                    <hr class="b-s-dashed">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Descrição:</label>
                        <div class="col-sm-12">
                            <textarea id="edit" class="md-textarea form-control" name="descricao" rows="4" required placeholder="Digite uma Descrição da Qualidade da Empresa..."></textarea>
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