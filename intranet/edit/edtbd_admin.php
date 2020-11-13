<?php

include './encrypt.php';
include './sessao.php';
include '../connection.php';

$MyCripty = new MyCripty();

$criptCodAdmin = trim($_GET['ldl']);

$nome = trim(preg_replace('/[^[:alpha:]_]/', '', $_POST['nome']));
$login = trim(preg_replace('/[^[:alpha:]_]/', '', $_POST['login']));
$senha = trim($_POST['senha']);

$cod_admin = $MyCripty->dec($criptCodAdmin);
$senha_crypt = $MyCripty->enc($senha);

try {
    $cmd = $pdo->prepare("CALL update_admin('$login','$senha_crypt','$nome','$cod_admin');");
    $cmd->execute();
    unset($cmd);
    echo "<script>location.href='index.php?url=admin.php&msg=alt';</script>";
} catch (PDOException $e) {
    echo("<br/>"
    . "<div class='container'>"
    . "<div class='row'>"
    . "<div class='col-sm-2'></div>"
    . "<div class='alert alert-danger col-sm-8' role='alert'> "
    . "Erro: %s\n" . $e->getMessage() . ""
    . "</div>"
    . "</div>"
    . "</div>");
}