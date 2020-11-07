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
            <h3>Sobre a Empresa</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descrição</th>
                            <th>Imagem Sobre</th>
                            <th>Video</th>
                            <th>Editar / Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectSobre = "CALL sel_sobre();";

                        $querySobre = $pdo->query($selectSobre);

                        while ($dados = $querySobre->fetch()) {
                            $cod = $dados['cod_sobre'];
                            $titulo = $dados['titulo'];
                            $descricao = $dados['descricao'];
                            $img_sobre = $dados['img_sobre'];
                            $video = $dados['video'];
                            $var = $MyCripty->enc($cod);
                            ?>
                            <tr>
                                <td><?= $titulo; ?></td>
                                <td><?= $descricao; ?></td>
                                <td><img style=" max-height:50px;" src="imagens/sobre/<?= $img_sobre; ?>" alt="<?= $img_sobre; ?>"/></td>
                                <td><?= $video; ?></td>
                                <td>
                                    <a href="?url=edtsobre.php&ldl=<?= $var; ?>" title="EDITAR"><i class="fa fa-2x fa-edit pr-3 pl-3"></i></a>
                                    <a href="?url=delbdsebre.php&ldl=<?= $var; ?>" 
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