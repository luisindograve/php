<?php

include("conexao.php");

$cod = $_POST['cod'];
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$endereco = $_POST["endereco"];
$foto = $_FILES["foto"];

$novoNome = sha1(md5(time()));
$arquivo = explode(".",$foto['name']);
$tipo = $arquivo[1];
$novoNome = $novoNome. ".". $tipo;

if(empty($foto['name'])) {
    $novoNome = "";
}

$destino = "imgs/".$novoNome;
move_uploaded_file($foto['tmp_name'], $destino);

$consulta = $conexao->prepare(" UPDATE contato SET nome=:nome, email=:email, telefone=:telefone, endereco=:endereco, foto=:foto WHERE cod=:cod");

$consulta->bindValue(":cod", $cod);
$consulta->bindValue(":nome", $nome);
$consulta->bindValue(":email", $email);
$consulta->bindValue(":telefone", $telefone);
$consulta->bindValue(":endereco", $endereco);
$consulta->bindValue(":foto", $novoNome);

$consulta->execute();
header("location:contatos.php");

?>;