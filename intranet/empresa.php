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
            <h3>Dados da Empresa</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome Fantasia</th>
                            <th>CNPJ</th>
                            <th>E-mail</th>
                            <th>Rua / Número</th>
                            <th>Cidade / UF</th>
                            <th>Logo</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectEmpresa = "CALL sel_empresa();";

                        $queryEmpresa = $pdo->query($selectEmpresa);

                        while ($dados = $queryEmpresa->fetch()) {
                            $cod = $dados['cod_empresa'];
                            $nome_fantasia = $dados['nome_fantasia'];
                            $cnpj = $dados['cnpj'];
                            $email = $dados['email'];
                            $logradouro = $dados['logradouro'];
                            $cidade = $dados['nome_cidade'];
                            $nr = $dados['nr'];
                            $uf = $dados['uf'];
                            $logomarca = $dados['logomarca'];

                            $var = $MyCripty->enc($cod);
                            ?>
                            <tr>
                                <td><?= $nome_fantasia; ?></td>
                                <td><?= $cnpj; ?></td>
                                <td><?= $email; ?></td>
                                <td><?= $logradouro; ?> - <?= $nr; ?></td>
                                <td><?= $cidade; ?>/<?= $uf; ?></td>
                                <td><img style=" max-height:50px;" src="imagens/logomarca/<?= $logomarca; ?>" alt="<?= $logomarca; ?>"/></td>

                                <td>
                                    <a href="?url=edt_empresa.php&ldl=<?= $var; ?>" title="EDITAR"><i class="fa fa-2x fa-edit pr-3 pl-3"></i></a>
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

