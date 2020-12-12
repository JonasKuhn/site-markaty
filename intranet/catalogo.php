<?php
require_once './sessao.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

@$msg = $_GET['msg'];
if (isset($msg) && $msg != false && $msg == "adc") {
    echo "<script type='text/javascript'>alert('Cadastro realizado com Sucesso!');</script>";
} else if (isset($msg) && $msg != false && $msg == "drop") {
    echo "<script type='text/javascript'>alert('O cadastro foi apagado com sucesso!');</script>";
} else if (isset($msg) && $msg != false && $msg == "alt") {
    echo "<script type='text/javascript'>alert('O cadastro foi alterado com sucesso!');</script>";
}
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Catálogo de Produtos</h3>
        </div>
        <div class="card-body">
            <a href="?url=adc_catalogo.php" title="Novo - <?= $menu; ?>"><i class="fa fa-2x pb-2 pl-2 fa-plus-square"></i></a>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Editar / Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectCatalogo = "CALL sel_catalogo();";

                        $queryCatalogo = $pdo->query($selectCatalogo);

                        while ($dados = $queryCatalogo->fetch()) {
                            $cod = $dados['cod_catalogo'];
                            $nome = $dados['nome'];
                            $descricao = $dados['descricao'];
                            $var = $MyCripty->enc($cod);
                            ?>
                            <tr>
                                <td><?= $nome; ?></td>
                                <td><?= $descricao; ?></td>
                                <td>
                                    <a href="?url=edt_catalogo.php&ldl=<?= $var; ?>" title="EDITAR"><i class="fa fa-2x fa-edit pr-3 pl-3"></i></a>
                                    <a href="?url=dropbd_catalogo.php&ldl=<?= $var; ?>" 
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