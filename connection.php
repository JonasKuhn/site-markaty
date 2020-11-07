<?php

$dsn = "mysql:dbname=database_markaty;host=localhost";
$dbuser = "root";
$dbpasswd = "pass43r003005@word";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpasswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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

date_default_timezone_set('America/Sao_Paulo');
