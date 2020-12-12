<?php
include_once './sessao.php';
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Adicionar Novo Usuário</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=adcbd_admin.php" enctype="multipart/form-data">
                <div class="container col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Login:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="login" required placeholder="Digite um nome para login...">
                        </div>
                    </div>
                    <hr class="b-s-dashed">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Nome:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nome" required placeholder="Digite seu nome...">
                        </div>
                    </div>
                    <hr class="b-s-dashed">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Senha:</label>
                        <div class="col-sm-12 row">
                            <div class="col-sm-10 ">
                                <input type="password" class="form-control" id="password" name="senha" required placeholder="Digite sua senha...">
                            </div>
                            <div class="col-sm-2">
                                <input class="btn btn-dark btn-block" type="button" id="showPassword" value="Visualizar"/>
                            </div>
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