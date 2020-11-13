<?php

include_once '../connection.php';
include_once './encrypt.php';
$MyCripty = new MyCripty();

session_start();
$login = trim(preg_replace('/[^[:alpha:]_]/', '', $_POST['login']));
$senha = trim($_POST["senha"]);
$senha_crypt = $MyCripty->enc($senha);

if ($login == "" || $senha == "") {
    header("Location: index.php?msg=empty");
}
$sql = "SELECT cod_admin, login, nome, senha FROM tb_admin WHERE login = ('$login');";
$result = $pdo->query($sql);
foreach ($result as $row) {
    if (!empty($row)) {
        if ($senha_crypt === $row['senha']) {
            $cod_admin = $MyCripty->enc($row["cod_admin"]);
            $_SESSION["cod_admin"] = $cod_admin;
            $_SESSION["nome"] = stripslashes($row["nome"]);
            $_SESSION["login"] = stripslashes($row["login"]);
            header("Location: index.php");
            exit;
        } else {
            header("Location: login.php?msg=bad_aut");
            exit;
        }
    }
}
header("Location: index.php?msg=bad_aut");
exit;
