<?php
$cmd = $pdo->prepare("select s.img_sobre from tb_sobre as s, tb_empresa as e "
        . "where s.cod_empresa = e.cod_empresa "
        . "order by s.cod_sobre ASC LIMIT 1;");
$cmd->execute();

$dados = $cmd->fetch();
$imgSobre = $dados['img_sobre'];
unset($cmd);
?>

<section id="produtos" class="wn__portfolio__area gallery__masonry__activation pt--130 pb--30 wow fadeInDown" data-wow-delay="0.2s"
         style="min-height: 65vh;
         background-image: url(intranet/imagens/sobre/<?= $imgSobre; ?>);
         background-repeat: no-repeat;  
         background-attachment: fixed;
         background-size: cover;
         background-position: center">
    <div class="container-fluid">
        <!-- FILTROS DE TIPO PRODUTO -->
        <div class="row col-xl-10" style="margin: 0 auto; background: rgba(211, 211, 211, 0.8); border-radius: 10px;">
            <?php
            $select1 = $pdo->prepare("select c.* from tb_empresa as e, tb_catalogo as c where e.cod_catalogo = c.cod_catalogo");
            $select1->execute();
            $dados1 = $select1->fetch();
            unset($select1);
            $nomeCatalogo = $dados1['nome'];
            $descricaoCatalogo = $dados1['descricao'];
            ?>
            <div class="pt--30 section__title text-center wow fadeInLeft" data-wow-delay="0.5s">
                <h2><?= $nomeCatalogo; ?></h2>
                <p><?= $descricaoCatalogo; ?></p>
            </div>
            <div class="row pb--30 col-xl-11" style="margin: 0 auto;">
                <?php
                $select2 = $pdo->prepare("select DISTINCT tp.cod_tipo_produto, tp.* "
                        . "from tb_tipo_produto as tp, tb_produto as p, tb_catalogo_produto as cp, tb_catalogo as c, tb_empresa as e "
                        . "where tp.cod_tipo_produto = p.cod_tipo_produto "
                        . "and p.cod_produto = cp.cod_produto "
                        . "and cp.cod_catalogo = c.cod_catalogo "
                        . "and c.cod_catalogo = e.cod_catalogo "
                        . "and p.fl_ativo = 1 "
                        . "order by tp.cod_tipo_produto ASC;");
                $select2->execute();

                $var = 2;
                while ($dados2 = $select2->fetch()) {
                    $codTipoProduto = $dados2['cod_tipo_produto'];
                    $descricaoTipoProduto = $dados2['descricao'];
                    ?>
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-4 wow fadeInLeft" data-wow-delay="0.<?= $var; ?>s">
                        <div class="thumb">
                            <div class="search">
                                <a data-toggle="modal" class="quickview modal-view detail-link" href="#productmodal<?= $codTipoProduto; ?>">
                                    <div class="portfolio produtos bg--rgbgray" style="border-radius: 10px; height: 200px;"> 
                                        <div class="thumbnail mt--70 text-center">
                                            <p style="font-size: 30px; font-weight: 700;">
                                                <?= $descricaoTipoProduto; ?>            
                                            </p>
                                            <p>Veja mais detalhes clicando</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- MODAL -->
                    <div class="modal fade" id="productmodal<?= $codTipoProduto; ?>" role="dialog" tabindex="-1" style="overflow-y: auto !important;">
                        <div class="modal-dialog modal__container" role="document">
                            <div class="modal-content">
                                <div class="modal-header modal__header">
                                    <h3 class="modal-title">Linha de <?= $descricaoTipoProduto; ?></h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-3 col-sm-6 col-12 text-center" style="padding-bottom: 20px; margin: 0 auto;">
                                            <div class="list-group  justify-content-lg-center" id="list-tab" role="tablist">
                                                <h3 class="modal-title">Produtos</h3>
                                                <?php
                                                $select3 = $pdo->prepare("select cod_produto, nome  from tb_produto WHERE fl_ativo = 1 AND cod_tipo_produto = '$codTipoProduto' group by cod_produto;");
                                                $select3->execute();
                                                $var1 = 1;
                                                while ($dados3 = $select3->fetch()) {
                                                    $cod_produto_menu = $dados3['cod_produto'];
                                                    $nomeProduto_menu = $dados3['nome'];
                                                    if ($var1 == 1) {
                                                        ?>
                                                        <a class="col-xl-12 col-lg-12 list-group-item list-group-item-action active" id="list-<?= $cod_produto_menu; ?>-list" data-toggle="list" href="#list-<?= $cod_produto_menu; ?>" role="tab" aria-controls="<?= $cod_produto_menu; ?>"><?= $nomeProduto_menu; ?></a>
                                                        <?php
                                                        $var1++;
                                                    } else {
                                                        ?>
                                                        <a class="col-xl-12 col-lg-12 list-group-item list-group-item-action" id="list-<?= $cod_produto_menu; ?>-list" data-toggle="list" href="#list-<?= $cod_produto_menu; ?>" role="tab" aria-controls="<?= $cod_produto_menu; ?>"><?= $nomeProduto_menu; ?></a>
                                                        <?php
                                                    }
                                                }
                                                unset($select3);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-9 col-12">
                                            <div class="tab-content" id="nav-tabContent">
                                                <?php
                                                $select4 = $pdo->prepare("select p.cod_produto, p.nome as nomeproduto, p.descricao, i.nome as nomeimagem, tp.cod_tipo_produto "
                                                        . "from tb_tipo_produto as tp, tb_produto as p, tb_catalogo_produto as cp, tb_catalogo as c, tb_empresa as e, tb_produto_imagem as pi, tb_imagem as i "
                                                        . "where tp.cod_tipo_produto = p.cod_tipo_produto "
                                                        . "and p.cod_produto = cp.cod_produto "
                                                        . "and cp.cod_catalogo = c.cod_catalogo "
                                                        . "and c.cod_catalogo = e.cod_catalogo "
                                                        . "and p.cod_produto = pi.cod_produto "
                                                        . "and pi.cod_imagem = i.cod_imagem "
                                                        . "and p.fl_ativo = 1 "
                                                        . "AND tp.cod_tipo_produto = '$codTipoProduto' group by p.cod_produto;");
                                                $select4->execute();

                                                $var2 = 1;
                                                while ($dados4 = $select4->fetch()) {
                                                    $codProduto = $dados4['cod_produto'];
                                                    $nomeProduto = $dados4['nomeproduto'];
                                                    $descricaoProduto = $dados4['descricao'];
                                                    $codTipoProduto = $dados4['cod_tipo_produto'];
                                                    $nomeImagemProduto = $dados4['nomeimagem'];

                                                    if ($var2 == 1) {
                                                        ?>
                                                        <div class="tab-pane fade show active" id="list-<?= $codProduto; ?>" role="tabpanel" aria-labelledby="list-<?= $codProduto; ?>-list">
                                                            <div class="modal-product">
                                                                <!-- INICIO IMAGENS PRODUTO -->
                                                                <div class="col-xl-5 col-lg-8" style="margin: 0 auto;">
                                                                    <div class="main-image images">
                                                                        <div class="wn__fotorama__wrapper">
                                                                            <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                                                                <?php
                                                                                $select5 = "select i.nome from tb_produto as p, tb_produto_imagem as pi, tb_imagem as i "
                                                                                        . "where p.cod_produto = pi.cod_produto "
                                                                                        . "and pi.cod_imagem = i.cod_imagem "
                                                                                        . "and p.cod_produto = '$codProduto';";

                                                                                $select5 = $pdo->prepare($select5);
                                                                                $select5->execute();
                                                                                $arrayImagensProduto = $select5->fetchAll(PDO::FETCH_ASSOC);
                                                                                unset($select5);
                                                                                foreach ($arrayImagensProduto as &$value) {
                                                                                    $nomeImagem = $value['nome'];
                                                                                    ?>
                                                                                    <a href="<?= $nomeImagem; ?>">
                                                                                        <img src="./intranet/imagens/produtos/<?= $nomeProduto; ?>/<?= $nomeImagem; ?>" alt="<?= $nomeImagem; ?>">
                                                                                    </a>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- FIM IMAGENS PRODUTO -->
                                                                <div class="col-xl-7 col-lg-12">
                                                                    <h2 class="text-center pb-2 pt-3"><?= $nomeProduto; ?></h2>
                                                                    <hr style="margin-top: 0.5rem;
                                                                        margin-bottom: 0.5rem;
                                                                        border: 0;
                                                                        border-top: 1px solid rgba(0,0,0,.1);">
                                                                    <div class="col-12" style="text-align: justify;">
                                                                        <?= $descricaoProduto; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $var2++;
                                                    } else if ($var2 != 1) {
                                                        ?>
                                                        <div class="tab-pane fade" id="list-<?= $codProduto; ?>" role="tabpanel" aria-labelledby="list-<?= $codProduto; ?>-list">
                                                            <div class="modal-product">
                                                                <!-- INICIO IMAGENS PRODUTO -->
                                                                <div class="col-xl-4 col-lg-6" style="margin: 0 auto;">
                                                                    <div class="main-image images">
                                                                        <div class="wn__fotorama__wrapper">
                                                                            <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                                                                <?php
                                                                                $select5 = "select i.nome from tb_produto as p, tb_produto_imagem as pi, tb_imagem as i "
                                                                                        . "where p.cod_produto = pi.cod_produto "
                                                                                        . "and pi.cod_imagem = i.cod_imagem "
                                                                                        . "and p.cod_produto = '$codProduto';";

                                                                                $select5 = $pdo->prepare($select5);
                                                                                $select5->execute();
                                                                                $arrayImagensProduto = $select5->fetchAll(PDO::FETCH_ASSOC);
                                                                                unset($select5);
                                                                                foreach ($arrayImagensProduto as &$value) {
                                                                                    $nomeImagem = $value['nome'];
                                                                                    ?>
                                                                                    <a href="<?= $nomeImagem; ?>">
                                                                                        <img src="./intranet/imagens/produtos/<?= $nomeProduto; ?>/<?= $nomeImagem; ?>" alt="<?= $nomeImagem; ?>">
                                                                                    </a>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- FIM IMAGENS PRODUTO -->
                                                                <div class="col-xl-8 col-lg-12">
                                                                    <h2 class="text-center pb-2 pt-3"><?= $nomeProduto; ?></h2>
                                                                    <hr style="margin-top: 0.5rem;
                                                                        margin-bottom: 0.5rem;
                                                                        border: 0;
                                                                        border-top: 1px solid rgba(0,0,0,.1);">
                                                                    <div class="col-12" style="text-align: justify;">
                                                                        <?= $descricaoProduto; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                unset($select4);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM MODAL -->
                        </div>
                        <!-- FIM VISUALIZAR PRODUTO -->
                    </div>
                    <?php
                    $var++;
                }
                unset($select2);
                ?>
            </div>
        </div>
        <!-- FIM FILTROS DE TIPO PRODUTO -->
    </div>
</section>

<!-- INICIO POPUP DOWNLOAD CATALOGO -->
<div class="wow slideInRight" data-wow-delay="4s" id="popupCatalogo" style="
     margin: 0 auto auto;
     position: fixed;
     right: 0;
     bottom: 2%;
     z-index: 999;
     padding-top: 20px;
     ">

    <div class="close__wrap wpp" onclick="removercatalogo()"
         style="
         position: absolute;
         top: 0;
         font-size: 24px;
         font-weight: bold;
         position: absolute;
         right: 10px;
         color: black;
         cursor: pointer;
         "
         >X
    </div>
    <a id="whatsapp-pg-produto" href="images/catalogo/catalogo.pdf" download="Catálogo Markaty">
        <img src="images/iconepdf.png" alt="Download do Catálogo" title="Download do Catálogo">
    </a>

</div>
<!-- FIM POPUP WPP -->

<script>
    function removercatalogo() {
        document.getElementById("popupCatalogo").style.display = 'none';
    }
</script>
<!-- FIM POPUP DOWNLOAD CATALOGO -->