 
<?php

include("conexao.php");
$contatos = [];

if (isset($_GET["pesquisa"])) {
    $pesquisa = "%" . $_GET['pesquisa'] . "%";

    $sql = 'SELECT * FROM contato WHERE nome LIKE :pesquisa';

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':pesquisa', $pesquisa);
    $consulta->execute();
    $contatos = $consulta->fetchAll(PDO::FETCH_ASSOC);

} else {
    $sql = 'SELECT * FROM contato';

    $consulta = $conexao->prepare($sql);
    $consulta->execute();
    $contatos = $consulta->fetchAll(PDO::FETCH_ASSOC);
}



?>

    <?php include('topo.php') ?>
    <?php include('menu.php') ?>
        <section class="page-section mt-5" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Lista de Contatos</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                    <form action="" method="get">
                    <div class="row mt-5">
                        <div class="col-10">
                            <input type="text" class="form-control" name="pesquisa">
                        </div>
                        <div class="col-2">
                            <input type="submit" value="Pesquisar" name="acao" class="btn btn-primary">
                        </div>
                    </div>
                    <br><br><br><br><br>
                </form>
                        <a type="button" class="btn btn-primary align-items-end" href="cadastro.php">Novo Contato</a>
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                  <th scope="col">Cod</th>
                                  <th scope="col">Nome</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Telefone</th>
                                  <th scope="col">Endereço</th>
                                  <th scope="col">Foto</th>
                                  <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                    <?php 
                        foreach($contatos as $contato){
                            if (empty(($contato['foto']))){
                                $foto = "semIMG.png";
                            }
                            else{
                                $foto = $contato['foto'];
                            };
                    ?>

                    <tr>
                      <td><?=$contato['cod']?></td>
                      <td><?=$contato['nome']?></td>
                      <td><?=$contato['email']?></td>
                      <td><?=$contato['telefone']?></td>
                      <td><?=$contato['endereco']?></td>
                      
                      <td><img class="img"src="imgs/<?=$foto?>" style="width :100px" ></td>
                      <td>
                        <form method="POST" action="apagar.php" >
                            <input type="hidden" name="cod" value="<?=$contato['cod']?>">
                            <input class="btn btn-danger" type="submit" name="acao" value="Apagar">
                        </form>
                        <form class="mt-2" method="POST" action="editar.php" >
                            <input type="hidden" name="cod" value="<?=$contato['cod']?>">
                            <input class="btn btn-warning" type="submit" name="acao" value="editar">
                        </form>
                      </td>
                    </tr> 

                    <?php } ?> 


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    <?php include('rodape.php') ?>