<?php
include_once './connection.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

$var = $_GET['ldl'];

$cod_empresa = $MyCripty->dec($var);

$selectEmpresa = "CALL sel_empresa_especifica('$cod_empresa');";

$queryEmpresa = $pdo->query($selectEmpresa);

$dados = $queryEmpresa->fetch();

$nome_fantasia = $dados['nome_fantasia'];
$cnpj = $dados['cnpj'];
$logradouro = $dados['logradouro'];
$nr = $dados['nr'];
$complemento = $dados['complemento'];
$bairro = $dados['bairro'];
$tel_whatsapp = $dados['tel_whatsapp'];
$tel_fixo = $dados['tel_fixo'];
$email = $dados['email'];
$instagram = $dados['instagram'];
$facebook = $dados['facebook'];
$maps = $dados['maps'];
$logomarca = $dados['logomarca'];
$cod_cat = $dados['cod_catalogo'];
$cod_ci = $dados['cod_cidade'];

$var = $MyCripty->enc($cod_empresa);
$var2 = $logomarca;
?>
<div class="container col-sm-6">
    <form class="form-horizontal" method="POST" action="?url=edtbd_empresa.php&ldl=<?= $var; ?>&ldk=<?= $logomarca; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-8 control-label">Nome Empresa:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="nome_fantasia" value="<?= $nome_fantasia; ?>" required placeholder="Digite o nome da Empresa...">
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">CNPJ:</label>
            <div class="col-sm-12">
                <input onkeyup="mascara(this, cnpj);" 
                       maxlength="18"  
                       ng-model="numero.valor"
                       id="cnpj"
                       name="cnpj" type="text" 
                       placeholder="Digite o Cnpj da empresa..." value="<?= $cnpj; ?>"
                       class="form-control input-md" required="">
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Logradouro:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <input type="text" class="form-control" name="logradouro" value="<?= $logradouro; ?>" required placeholder="Digite o Logradouro da Empresa...">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Número:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <input type="text" class="form-control" 
                           name="nr" 
                           onkeyup="somenteNumeros(this);" 
                           maxlength="5"  
                           minlength="1"
                           ng-model="numero.valor"
                           value="<?= $nr; ?>"
                           required
                           placeholder="Digite o Número de Endereço da Empresa...">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Complemento:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <input type="text" class="form-control" name="complemento" value="<?= $complemento; ?>" placeholder="Digite um Complemento para o Endereço...">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Bairro:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <input type="text" class="form-control" name="bairro" value="<?= $bairro; ?>" placeholder="Digite o Bairro da Empresa...">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">WhatsApp:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <input type="text" class="form-control" 
                           name="tel_whatsapp" 
                           value="<?= $tel_whatsapp; ?>"
                           id="tel_whatsapp" 
                           placeholder="(11) 12345-6789">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Telefone Fixo:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <input type="text" class="form-control" 
                           name="tel_fixo" 
                           value="<?= $tel_fixo; ?>"
                           id="tel_fixo" 
                           placeholder="(11) 12345-6789">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">E-mail:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <input type="email" class="form-control" name="email" value="<?= $email; ?>" placeholder="Digite o E-mail da Empresa...">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Instagram:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <input type="text" class="form-control" name="instagram" value="<?= $instagram; ?>" placeholder="Insira o LINK do Instagram da Empresa...">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Facebook:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <input type="text" class="form-control" name="facebook" value="<?= $facebook; ?>" placeholder="Insira o LINK do Facebook da Empresa...">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label">Maps:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <input type="text" class="form-control" name="maps" value="<?= $maps; ?>" placeholder="Insira o LINK do Maps da Empresa...">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <div class="col-sm-12 row">
                <img class="col-sm-2 " src="./imagens/logomarca/<?= $logomarca; ?>" >
                <div class="col-sm-10">
                    <label class="col-sm-4 control-label">Logo Marca: <?= $logomarca; ?></label>
                    <input class="col-sm-6 " type="file" class="form-control" name="logomarca" placeholder="Selecione a Logo Marca da Empresa...">
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label" required >Nome da Cidade:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <select class="form-control" name="cod_cidade">
                        <?php
                        include './../connection.php';

                        $selectCidade = "select c.* "
                                . "from tb_cidade as c, tb_estado as e "
                                . "where c.cod_estado = e.cod_estado;";

                        $queryCidade = $pdo->query($selectCidade);

                        while ($dados = $queryCidade->fetch()) {
                            $nome_cidade = $dados['nome_cidade'];
                            $cod_cidade = $dados['cod_cidade'];

                            if ($cod_ci == $cod_cidade) {
                                ?>
                                <option selected="true" value="<?= $cod_cidade; ?>"><?= $cod_cidade; ?> - <?= $nome_cidade; ?></option>
                                <?php
                            } else if ($cod_ci != $cod_cidade) {
                                ?>
                                <option value="<?= $cod_cidade; ?>"><?= $cod_cidade; ?> - <?= $nome_cidade; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <div class="form-group">
            <label class="col-sm-8 control-label" required >Nome do Catálogo:</label>
            <div class="col-sm-12 row">
                <div class="col-sm-12 ">
                    <select class="form-control" name="cod_catalogo">
                        <?php
                        include './connection.php';

                        $selectCatalogo = "select * from tb_catalogo";

                        $queryCatalogo = $pdo->query($selectCatalogo);

                        while ($dados = $queryCatalogo->fetch()) {
                            $cod_catalogo = $dados['cod_catalogo'];
                            $nome = $dados['nome'];
                            if ($cod_cat == $cod_catalogo) {
                                ?>
                                <option selected="true" value="<?= $cod_catalogo; ?>"><?= $cod_catalogo; ?> - <?= $nome; ?></option>
                                <?php
                            } else if ($cod_cat != $cod_catalogo) {
                                ?>
                                <option value="<?= $cod_catalogo; ?>"><?= $cod_catalogo; ?> - <?= $nome; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <hr class="b-s-dashed">
        <input class="btn btn-dark btn-block" type="submit" onclick="return editar('<?php $nome_fantasia; ?>');" value="EDITAR" name="editar">
    </form>
</div>