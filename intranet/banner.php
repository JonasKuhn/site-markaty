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
            <h3>Banner de Destaque</h3>
        </div>
        <div class="card-body">
            <a href="?url=adc_banner.php" title="Novo - <?= $menu; ?>"><i class="fa fa-2x pb-2 pl-2 fa-plus-square"></i></a>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descrição</th>
                            <th>Ativo</th>
                            <th>Imagem Banner</th>
                            <th>Editar / Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectBanner = "CALL sel_banner();";

                        $queryBanner = $pdo->query($selectBanner);

                        while ($dados = $queryBanner->fetch()) {
                            $cod = $dados['cod_banner'];
                            $titulo = $dados['titulo'];
                            $descricao = $dados['descricao'];
                            $fl_ativo = $dados['fl_ativo'];
                            $img_banner = $dados['img_banner'];
                            $var = $MyCripty->enc($cod);
                            ?>
                            <tr>
                                <td><?= $titulo; ?></td>
                                <td><?= $descricao; ?></td>
                                <td><?= $fl_ativo; ?></td>
                                <td><img style=" max-height:50px;" src="imagens/banner/<?= $img_banner; ?>" alt="<?= $img_banner; ?>"/></td>
                                <td>
                                    <a href="?url=edtbanner.php&ldl=<?= $var; ?>" title="EDITAR"><i class="fa fa-2x fa-edit pr-3 pl-3"></i></a>
                                    <a href="?url=delbdbanner.php&ldl=<?= $var; ?>" 
                                       onclick="return excluir('<?= $titulo; ?>');" title="EXCLUIR">
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