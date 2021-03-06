<?php
require_once './sessao.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

@$msg = $_GET['msg'];
if (isset($msg) && $msg != false && $msg == "alt") {
    echo "<script type='text/javascript'>alert('Cadastro alterado com Sucesso!');</script>";
}if (isset($msg) && $msg != false && $msg == "adc") {
    echo "<script type='text/javascript'>alert('Cadastro realizado com Sucesso!');</script>";
} else if (isset($msg) && $msg != false && $msg == "drop") {
    echo "<script type='text/javascript'>alert('O cadastro foi apagado com sucesso!');</script>";
}
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Tipos de Produto</h3>
        </div>
        <div class="card-body">
            <a href="?url=adc_tipo_produto.php" title="Novo - <?= $menu; ?>"><i class="fa fa-2x pb-2 pl-2 fa-plus-square"></i></a>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Editar / Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectTipoProduto = "CALL sel_tipo_produto();";

                        $queryTipoProduto = $pdo->query($selectTipoProduto);

                        while ($dados = $queryTipoProduto->fetch()) {
                            $cod = $dados['cod_tipo_produto'];
                            $nome = $dados['descricao'];
                            $var = $MyCripty->enc($cod);
                            
                            $codigos = array_column($arrayTipoProdutoAtivos, 'cod_tipo_produto');
                            $valor = array_search($cod, $codigos);
                            ?>
                            <tr>
                                <td><?= $nome; ?></td>
                                <td>
                                    <a href="?url=edt_tipo_produto.php&ldl=<?= $var; ?>" title="EDITAR"><i class="fa fa-2x fa-edit pr-3 pl-3"></i></a>
                                    <?php
                                    if ($valor != '') {
                                        ?>
                                        <a href="#" 
                                           onclick="return naoexcluirtipoproduto();" title="EXCLUIR">
                                            <i class="fa fa-2x fa-trash-o"></i>
                                        </a> 
                                        <?php
                                    } else {
                                        ?>
                                        <a href="?url=dropbd_tipo_produto.php&ldl=<?= $var; ?>" 
                                           onclick="return excluir('<?= $nome; ?>');" title="EXCLUIR">
                                            <i class="fa fa-2x fa-trash-o"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>
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