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
            <h3>Lista de Produtos</h3>
        </div>
        <div class="card-body">
            <a href="?url=adc_produto.php" title="Novo - Produtos"><i class="fa fa-2x pb-2 pl-2 fa-plus-square"></i></a>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ativo</th>
                            <th>Tipo de Produto</th>
                            <th>Imagem</th>
                            <th>Editar / Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectProduto = "CALL sel_produto();";

                        $queryProduto = $pdo->query($selectProduto);

                        while ($dados = $queryProduto->fetch()) {
                            $cod = $dados['cod_produto'];
                            $nome = $dados['nome'];
                            $descricao = $dados['descricao'];
                            $fl_ativo = $dados['fl_ativo'];
                            $nome_tipo_produto = $dados['nome_tipo_item'];
                            $nome_imagem = $dados['img_nome'];
                            $var = $MyCripty->enc($cod);
                            ?>
                            <tr>
                                <td><?= $nome; ?></td>
                                <td><?= $descricao; ?></td>
                                <td><?= $fl_ativo; ?></td>
                                <td><?= $nome_tipo_produto; ?></td>
                                <td><img style=" max-height:50px;" src="imagens/produtos/<?= $nome_imagem; ?>" alt="<?= $nome_imagem; ?>"/></td>
                                <td>
                                    <a href="?url=edtproduto.php&ldl=<?= $var; ?>" title="EDITAR"><i class="fa fa-2x fa-edit pr-3 pl-3"></i></a>
                                    <a href="?url=delbdproduto.php&ldl=<?= $var; ?>" 
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