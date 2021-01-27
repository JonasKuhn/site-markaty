<!-- INICIO SOBRE  
style="background-image: url(intranet/imagens/banner/1.png); background-repeat: no-repeat;  background-attachment: fixed;"-->

<div id="sobre" class="page-about fullscreen about_area bg--rgbgray pb--40 wow fadeIn" data-wow-delay="0.2s">
    <div class="container-fluid mt--130">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center pb--30">
                    <h2>Sobre A empresa</h2>
                    <h4>Conheça A Nossa História</h4>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-lg-12">
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
                    <div class="content thumb" style="text-align: justify">

                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-thumbnail" src="intranet/imagens/sobre/<?= $imgSobre; ?>" alt="<?= $imgSobre; ?>">
                            </div>
                            <div class="col-md-6">
                                <p style="text-align: justify;"><?= $descricaoSobre; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="col-lg-12">
                <div class="content" >
                    <div class="skill-container">
                        <?php
                        $cmd = $pdo->prepare("select q.* from tb_qualidade as q, tb_empresa as e "
                                . "where q.cod_empresa = e.cod_empresa "
                                . "order by q.nome ASC;");
                        $cmd->execute();

                        while ($dados = $cmd->fetch()) {
                            $nomeQualidade = $dados['nome'];
                            $descricaoQualidade = $dados['descricao'];
                            ?>
                            <!-- Start single skill -->
                            <div class="single-skill text-center">
                                <h4><?= $nomeQualidade; ?></h4>
                                <p class="mt--20 mb--20"><?= $descricaoQualidade; ?></p>
                            </div>
                            <!-- End single skill -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FIM SOBRE -->