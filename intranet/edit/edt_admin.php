<?php
include_once './sessao.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

$var = $_GET['ldl'];

$cod_admin = $MyCripty->dec($var);

$selectAdmin = "CALL sel_admin_especifico('$cod_admin');";

$queryAdmin = $pdo->query($selectAdmin);

$dados = $queryAdmin->fetch();

$login = $dados['login'];
$senha = $dados['senha'];
$nome = $dados['nome'];

$senhas_des = $MyCripty->dec($senha);
$var = $MyCripty->enc($cod_admin);
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Adicionar Novo Usuário</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="?url=edtbd_admin.php&ldl=<?= $var; ?>" enctype="multipart/form-data">
                <div class="container col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Login:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="login" value="<?= $login; ?>" required placeholder="Digite um nome para login...">
                        </div>
                    </div>
                    <hr class="b-s-dashed">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Nome:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nome" value="<?= $nome; ?>" required placeholder="Digite seu nome...">
                        </div>
                    </div>
                    <hr class="b-s-dashed">
                    <div class="form-group">
                        <label class="col-sm-8 control-label">Senha:</label>
                        <div class="col-sm-12 row">
                            <div class="col-sm-10 ">
                                <input type="password" class="form-control" id="password" name="senha" value="<?= $senhas_des; ?>" required placeholder="Digite sua senha...">
                            </div>
                            <div class="col-sm-2">
                                <i class="btn btn-dark btn-block fa fa-eye" type="button" id="showPassword"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="b-s-dashed">
                <div style="display: flex;
                     flex-direction: column;
                     justify-content: center;
                     align-items: center;" >
                    <input class="col-sm-5 btn btn-dark btn-block" type="submit" onclick="return confirm('Deseja realmente editar o registro <?= $login; ?> ?');" value="EDITAR" name="editar">
                </div>
            </form>
        </div>
    </div>
</div>