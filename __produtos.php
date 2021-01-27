<!-- INICIO PRODUTOS -->
<section id="produtos" class="wn__portfolio__area gallery__masonry__activation mt--130 pb--40 wow fadeIn" data-wow-delay="0.2s">
    <div class="container-fluid">
        
        <!-- FILTROS -->
        <div class="row">
            <div class="col-lg-12">
                <?php
                $cmd = $pdo->prepare("select c.* from tb_empresa as e, tb_catalogo as c where e.cod_catalogo = c.cod_catalogo");
                $cmd->execute();
                $dados = $cmd->fetch();
                unset($cmd);
                $nomeCatalogo = $dados['nome'];
                $descricaoCatalogo = $dados['descricao'];
                ?>
                <div class="section__title text-center" style="color: white;">
                    <h2 style="color: white;"><?= $nomeCatalogo; ?></h2>
                    <p><?= $descricaoCatalogo; ?></p>
                </div>
                <div class="gallery__menu">
                    <button data-filter="*" class="is-checked">Filtrar - Todos</button>
                    <?php
                    $cmd = $pdo->prepare("select DISTINCT tp.cod_tipo_produto, tp.* "
                            . "from tb_tipo_produto as tp, tb_produto as p, tb_catalogo_produto as cp, tb_catalogo as c, tb_empresa as e "
                            . "where tp.cod_tipo_produto = p.cod_tipo_produto "
                            . "and p.cod_produto = cp.cod_produto "
                            . "and cp.cod_catalogo = c.cod_catalogo "
                            . "and c.cod_catalogo = e.cod_catalogo "
                            . "and p.fl_ativo = 1 "
                            . "order by tp.cod_tipo_produto ASC;");
                    $cmd->execute();

                    $i = 1;
                    while ($dados = $cmd->fetch()) {
                        $descricaoTipoProduto = $dados['descricao'];
                        ?>
                        <button data-filter=".cat--<?= $i; ?>"><?= $descricaoTipoProduto; ?></button>
                        <?php
                        $i++;
                    }
                    unset($cmd);
                    ?>

                </div>
            </div>
        </div>
        
        <div class="row masonry__wrap">
            <?php
            $cmdd = $pdo->prepare("select DISTINCT tp.cod_tipo_produto "
                    . "from tb_tipo_produto as tp, tb_produto as p, tb_catalogo_produto as cp, tb_catalogo as c, tb_empresa as e "
                    . "where tp.cod_tipo_produto = p.cod_tipo_produto "
                    . "and p.cod_produto = cp.cod_produto "
                    . "and cp.cod_catalogo = c.cod_catalogo "
                    . "and c.cod_catalogo = e.cod_catalogo "
                    . "and p.fl_ativo = 1 "
                    . "order by tp.cod_tipo_produto ASC;");
            $cmdd->execute();
            $arrayCodTipoProduto = $cmdd->fetchAll(PDO::FETCH_ASSOC);
            unset($cmdd);

            $i = 1;
            foreach ($arrayCodTipoProduto as &$value) {
                $codTipoProduto = $value['cod_tipo_produto'];

                $cmd = $pdo->prepare("select p.cod_produto, p.nome as nomeproduto, p.descricao, i.nome as nomeimagem, tp.cod_tipo_produto "
                        . "from tb_tipo_produto as tp, tb_produto as p, tb_catalogo_produto as cp, tb_catalogo as c, tb_empresa as e, tb_produto_imagem as pi, tb_imagem as i "
                        . "where tp.cod_tipo_produto = p.cod_tipo_produto "
                        . "and p.cod_produto = cp.cod_produto "
                        . "and cp.cod_catalogo = c.cod_catalogo "
                        . "and c.cod_catalogo = e.cod_catalogo "
                        . "and p.cod_produto = pi.cod_produto "
                        . "and pi.cod_imagem = i.cod_imagem "
                        . "and p.fl_ativo = 1 "
                        . "AND tp.cod_tipo_produto = '$codTipoProduto' group by p.cod_produto;");
                $cmd->execute();

                while ($dados = $cmd->fetch()) {
                    $codProduto = $dados['cod_produto'];
                    $nomeProduto = $dados['nomeproduto'];
                    $descricaoProduto = $dados['descricao'];
                    $codTipoProduto = $dados['cod_tipo_produto'];
                    $nomeImagemProduto = $dados['nomeimagem'];
                    ?>
                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--<?= $i; ?>">
                        <div class="portfolio bg--rgbgray" style="border-radius: 10px;"> 
                            <div class="thumb">
                                <img style="border-radius: 5px;" src="./intranet/imagens/produtos/<?= $nomeProduto; ?>/<?= $nomeImagemProduto; ?>" alt="<?= $nomeImagemProduto; ?>">

                                <div class="search">
                                    <a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal<?= $codProduto; ?>">
                                        <i class="bi bi-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="thumbnail mt-2">
                                <h6><?= $nomeProduto; ?></h6>
                                <p>Veja mais detalhes clicando na Imagem</p>
                            </div>
                        </div>
                    </div>
                    <!-- VISUALIZAR PRODUTO -->
                    <div id="quickview-wrapper">
                        <!-- MODAL -->
                        <div class="modal fade" id="productmodal<?= $codProduto; ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal__container" role="document">
                                <div class="modal-content">
                                    <div class="modal-header modal__header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-product">
                                            <!-- INICIO IMAGENS PRODUTO -->
                                            <div class="product-images">
                                                <div class="main-image images">
                                                    <div class="wn__fotorama__wrapper">
                                                        <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                                            <?php
                                                            $selectImagensProduto = "select i.nome from tb_produto as p, tb_produto_imagem as pi, tb_imagem as i "
                                                                    . "where p.cod_produto = pi.cod_produto "
                                                                    . "and pi.cod_imagem = i.cod_imagem "
                                                                    . "and p.cod_produto = '$codProduto';";

                                                            $cmdd = $pdo->prepare($selectImagensProduto);
                                                            $cmdd->execute();
                                                            $arrayImagensProduto = $cmdd->fetchAll(PDO::FETCH_ASSOC);
                                                            unset($cmdd);
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
                                </div>
                            </div>
                        </div>
                        <!-- FIM MODAL -->
                    </div>
                    <!-- FIM VISUALIZAR PRODUTO -->
                    <?php
                }
                $i++;
            }
            ?>
        </div>
    </div>
</section>
<!-- FIM PRODUTOS -->