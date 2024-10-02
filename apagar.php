<?php 
    include ("conexao.php");

    $cod = $_POST ['cod'];
    
    

    $consulta = $conexao->prepare("DELETE FROM contato WHERE cod=:cod");
    
    $consulta->bindValue(':cod', $cod);
    

    $consulta->execute();

    header("location:contatos.php")

?>
