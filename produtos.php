<section id="produtos" class="wn__portfolio__area gallery__masonry__activation mt--130 wow fadeIn" data-wow-delay="0.2s" style="min-height: 65vh;">
    <div class="container-fluid">
        <!-- FILTROS DE TIPO PRODUTO -->
        <div class="row">
            <div class="col-10" style="margin: 0 auto;">
                <?php
                $select1 = $pdo->prepare("select c.* from tb_empresa as e, tb_catalogo as c where e.cod_catalogo = c.cod_catalogo");
                $select1->execute();
                $dados1 = $select1->fetch();
                unset($select1);
                $nomeCatalogo = $dados1['nome'];
                $descricaoCatalogo = $dados1['descricao'];
                ?>
                <div class="section__title text-center">
                    <h2><?= $nomeCatalogo; ?></h2>
                    <p><?= $descricaoCatalogo; ?></p>
                </div>
                <div class="row">
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

                    while ($dados2 = $select2->fetch()) {
                        $codTipoProduto = $dados2['cod_tipo_produto'];
                        $descricaoTipoProduto = $dados2['descricao'];
                        ?>
                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                            <div class="thumb">
                                <div class="search">
                                    <a data-toggle="modal" class="quickview modal-view detail-link" href="#productmodal<?= $codTipoProduto; ?>">
                                        <div class="portfolio bg--rgbgray produtos" style="border-radius: 10px; height: 200px;"> 
                                            <div class="thumbnail mt--70 text-center">
                                                <h2><?= $descricaoTipoProduto; ?></h2>
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
                                        <h3 class="modal-title"><?= $descricaoTipoProduto; ?></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body" >
                                        <div class="row">
                                            <div class="col-md-3 col-8 text-center" style="margin: 0 auto; padding-bottom: 20px;">
                                                <div class="list-group" id="list-tab" role="tablist">
                                                    <?php
                                                    $select3 = $pdo->prepare("select cod_produto, nome  from tb_produto WHERE fl_ativo = 1 AND cod_tipo_produto = '$codTipoProduto' group by cod_produto;");
                                                    $select3->execute();
                                                    $var1 = 1;
                                                    while ($dados3 = $select3->fetch()) {
                                                        $cod_produto_menu = $dados3['cod_produto'];
                                                        $nomeProduto_menu = $dados3['nome'];
                                                        if ($var1 == 1) {
                                                            ?>
                                                            <a class="list-group-item list-group-item-action active" id="list-<?= $cod_produto_menu; ?>-list" data-toggle="list" href="#list-<?= $cod_produto_menu; ?>" role="tab" aria-controls="<?= $cod_produto_menu; ?>"><?= $nomeProduto_menu; ?></a>
                                                            <?php
                                                            $var1++;
                                                        } else {
                                                            ?>
                                                            <a class="list-group-item list-group-item-action" id="list-<?= $cod_produto_menu; ?>-list" data-toggle="list" href="#list-<?= $cod_produto_menu; ?>" role="tab" aria-controls="<?= $cod_produto_menu; ?>"><?= $nomeProduto_menu; ?></a>
                                                            <?php
                                                        }
                                                    }
                                                    unset($select3);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-12">
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
                                                                    <div class="product-images">
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
                                                                    <div class="product-info">
                                                                        <h2 class="text-center"><?= $nomeProduto; ?></h2>
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
                                                                    <div class="product-images">
                                                                        <div class="main-image images">
                                                                            <div class="wn__fotorama__wrapper">
                                                                                <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                                                                    <?php
                                                                                    $select6 = "select i.nome from tb_produto as p, tb_produto_imagem as pi, tb_imagem as i "
                                                                                            . "where p.cod_produto = pi.cod_produto "
                                                                                            . "and pi.cod_imagem = i.cod_imagem "
                                                                                            . "and p.cod_produto = '$codProduto';";

                                                                                    $select6 = $pdo->prepare($select6);
                                                                                    $select6->execute();
                                                                                    $arrayImagensProduto = $select6->fetchAll(PDO::FETCH_ASSOC);
                                                                                    unset($select6);
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
                                                                    <div class="product-info">
                                                                        <h2><?= $nomeProduto; ?></h2>
                                                                        <div class="quick-desc" style="text-align: justify;">
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
                    }
                    unset($select2);
                    ?>
                </div>
            </div>
        </div>
        <!-- FIM FILTROS DE TIPO PRODUTO -->
    </div>
</section>