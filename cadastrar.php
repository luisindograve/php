<?php

include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$foto = $_FILES['foto'];

$novo_nome = sha1(md5(time()));
$arquivo = explode(".", $foto['name']);
$tipo = $arquivo[1];
$novo_nome = $novo_nome . "." . $tipo;

if (empty($foto['name'])) {
	$novo_nome = "";
}
$destino = "imgs/" . $novo_nome;
move_uploaded_file($foto['tmp_name'], $destino);



$consulta = $conexao->prepare(query: "INSERT INTO contato (nome, email, telefone, endereco, foto) VALUES (:nome, :email, :telefone, :endereco, :foto)");

$consulta->bindValue(':nome',  $nome);
$consulta->bindValue(':email',  $email);
$consulta->bindValue(':telefone',  $telefone);
$consulta->bindValue(':endereco',  $endereco);
$consulta->bindValue(':foto', $novo_nome);

$consulta->execute();

header("location:contatos.php");
