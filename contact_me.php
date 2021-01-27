<?php

// Check for empty fields
if (empty($_POST['nome']) ||
        empty($_POST['email']) ||
        empty($_POST['telefone']) ||
        empty($_POST['mensagem']) ||
        !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    return false;
}

$nome = strip_tags(htmlspecialchars($_POST['nome']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$telefone = strip_tags(htmlspecialchars($_POST['telefone']));
$mensagem = strip_tags(htmlspecialchars($_POST['mensagem']));

$destino = 'jonaskuhn220@gmail.com'; 
$assunto = "Formulário de contato do site:  $nome";
$corpo_email = "Você recebeu uma nova mensagem do formulário de contato do seu site. \n \n "
        . "Aqui estão os detalhes:\n\n"
        . "Nome: $nome\n\n"
        . "Email: $email\n\n"
        . "Celular: $telefone\n\n"
        . "Mensagem:\n $mensagem";

$headers = "From: noreply@gmail.com\n"; 
$headers .= "Reply-To: $email";
mail($destino, $assunto, $corpo_email, $headers);
return true;
?>