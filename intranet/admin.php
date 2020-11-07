<?php
require_once './sessao.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

@$msg = $_GET['msg'];
if (isset($msg) && $msg != false && $msg == "alt") {
    echo "<script type='text/javascript'>alert('Cadastro alterado com Sucesso!');</script>";
}
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Usuários</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>Senha</th>
                            <th>Editar / Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectAdmin = "CALL sel_admin();";

                        $queryAdmin = $pdo->query($selectAdmin);

                        while ($dados = $queryAdmin->fetch()) {
                            $cod = $dados['cod_admin'];
                            $nome = $dados['nome'];
                            $login = $dados['login'];
                            $senha = $dados['senha'];
                            $var = $MyCripty->enc($cod);
                            ?>
                            <tr>
                                <td><?= $nome; ?></td>
                                <td><?= $login; ?></td>
                                <td><?= $senha; ?></td>
                                <td>
                                    <a href="?url=edtadmin.php&ldl=<?= $var; ?>" title="EDITAR"><i class="fa fa-2x fa-edit pr-3 pl-3"></i></a>
                                    <a href="?url=delbdadmin.php&ldl=<?= $var; ?>" 
                                       onclick="return excluir('<?= $nome; ?>');" title="EXCLUIR">
                                        <i class="fa fa-2x fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>