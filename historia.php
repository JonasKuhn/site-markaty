<!-- INICIO HISTORIA -->
<section class="slider--15 wow fadeInDown" data-wow-delay="0.2s">
    <?php
    $cmd = $pdo->prepare("select s.* from tb_sobre as s, tb_empresa as e "
            . "where s.cod_empresa = e.cod_empresa "
            . "order by s.cod_sobre ASC LIMIT 1;");
    $cmd->execute();

    while ($dados = $cmd->fetch()) {
        $tituloSobre = $dados['titulo'];
        $descricaoSobre = $dados['descricao'];
        $imgSobre = $dados['img_sobre'];
        $videoSobre = $dados['video'];
        ?>
        <div class="pb--30 page-about about_area wow fadeIn" data-wow-delay="0.2s"
             style="background-image: url(intranet/imagens/sobre/<?= $imgSobre; ?>);
             background-repeat: no-repeat;  
             background-attachment: fixed;
             background-size: cover;
             background-position: center">
            <div class="slide fullscreen align__center--left">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-7 col-xl-6">
                            <div class="slider__content">
                                <div class="contentbox wow fadeInLeft" data-wow-delay="0.5s">
                                    <h2><?= $tituloSobre; ?></span></h2>
                                    <a class="shopbtn" href="#historia">Conheça a nossa História</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="historia" class="col-10 col-xl-10" style="background-color: rgba(255,255,255,0.8); margin:0 auto;border-radius: 20px;">
                <div id="historia" class="row pt--30 wow fadeInLeftBig"  data-wow-delay="0.5s">
                    <div class="col-12">
                        <div class="section__title text-center">
                            <h3>Conheça A Nossa História</h3>
                        </div>
                    </div>
                </div>
                <div class="container pb--30">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 wow fadeIn"  data-wow-delay="1s">
                        <div class="content thumb" style="text-align: justify">
                            <div class="row">
                                <p style="text-align: justify;"><?= $descricaoSobre; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="content thumb">
                            <div class="skill-container">
                                <div class="row">
                                    <?php
                                    $cmd = $pdo->prepare("select q.* from tb_qualidade as q, tb_empresa as e "
                                            . "where q.cod_empresa = e.cod_empresa "
                                            . "order by q.nome ASC;");
                                    $cmd->execute();
                                    $var = 5;
                                    while ($dados = $cmd->fetch()) {
                                        $nomeQualidade = $dados['nome'];
                                        $descricaoQualidade = $dados['descricao'];
                                        ?>
                                        <div class="single-skill text-center col-12 col-md-12 col-lg-12 col-xl-4 wow fadeInLeft"  data-wow-delay="0.<?= $var; ?>s">
                                            <h4><?= $nomeQualidade; ?></h4>
                                            <p class="mt--20 mb--20 text-justify"><?= $descricaoQualidade; ?></p>
                                        </div>
                                        <?php
                                        $var = $var + 2;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    unset($cmd);
    ?>
</section>
<!-- FIM HISTORIA -->
