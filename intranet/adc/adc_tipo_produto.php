<?php
include_once './sessao.php';
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Adicionar Novo Tipo de Produto</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=adcbd_tipo_produto.php" enctype="multipart/form-data">
                <div class="container col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Título:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="descricao" required placeholder="Digite um Título para o Tipo de Produto...">
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