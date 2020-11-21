<?php
require_once './sessao.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

@$msg = $_GET['msg'];
if (isset($msg) && $msg != false && $msg == "adc") {
    echo "<script type='text/javascript'>alert('Cadastro realizado com Sucesso!');</script>";
} else if (isset($msg) && $msg != false && $msg == "logexist") {
    echo "<script type='text/javascript'>alert('Já existe um usuário com esse login!');</script>";
} else if (isset($msg) && $msg != false && $msg == "drop") {
    echo "<script type='text/javascript'>alert('O cadastro foi apagado com sucesso!');</script>";
} else if (isset($msg) && $msg != false && $msg == "alt") {
    echo "<script type='text/javascript'>alert('O cadastro foi alterado com sucesso!');</script>";
}
?>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center">
            <h3>Imformações Sobre a História da Empresa</h3>
        </div>
        <div class="card-body">
            <a href="?url=adc_sobre.php" title="Novo - <?= $menu; ?>"><i class="fa fa-2x pb-2 pl-2 fa-plus-square"></i></a>
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
                                    <a href="?url=edt_sobre.php&ldl=<?= $var; ?>" title="EDITAR"><i class="fa fa-2x fa-edit pr-3 pl-3"></i></a>
                                    <a href="?url=dropbd_sobre.php&ldl=<?= $var; ?>&ldk=<?= $img_sobre; ?>" 
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