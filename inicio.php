<!-- INICIO BANNER -->
<div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme wow fadeInDown" data-wow-delay="0.2s">
    <?php
    $selectBannerAtivo = "select b.* from tb_banner as b where b.fl_ativo = 1;";

    $queryBannerAtivo = $pdo->prepare($selectBannerAtivo);
    $queryBannerAtivo->execute();

    while ($dados = $queryBannerAtivo->fetch()) {
        $tituloBanner = $dados['titulo'];
        $descricaoBanner = $dados['descricao'];
        $imgBanner = $dados['img_banner'];
        ?>

        <!-- INICIO SLIDE BANNER -->
        <div class="slide fullscreen align__center--left" 
             style="
             background-image: url(intranet/imagens/banner/<?= $imgBanner; ?>);
             background-repeat: no-repeat;
             background-size: cover;
             background-position: center;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider__content">
                            <div class="contentbox">
                                <h2><?= $tituloBanner; ?></span></h2>
                                <h2><?= $descricaoBanner; ?></h2>
                                <!--<h2>from <span>Here </span></h2>
                                <a class="shopbtn" href="#">Veja Mais</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM SLIDE BANNER -->
        <?php
    }
    unset($cmd);
    ?>
</div>
<!-- FIM BANNER -->