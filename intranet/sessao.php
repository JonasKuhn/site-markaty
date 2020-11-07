<?php 
// Inicia sessões 
@session_start(); 
 
// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION["cod_admin"]) || !isset($_SESSION["nome"]) || !isset($_SESSION["login"])) 
{ 
// Usuário não logado! Redireciona para a página de login 
header("Location: login.php?msg=aut"); 
exit; 
} 
?>