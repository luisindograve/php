<?php
include("conexao.php");
$cod = $_POST['cod'];
$sql = 'SELECT * FROM contato WHERE cod =  :cod';
$consulta = $conexao->prepare($sql);
$consulta->bindValue(':cod', $cod);
$consulta->execute();
$contato = $consulta->fetch(PDO::FETCH_ASSOC);

if (empty($contato['foto'])) {
    $foto = 'semImagem.png';
} else {
    $foto = $contato['foto'];
}
?>

<?php include('topo.php') ?>
<?php include('menu.php') ?>
<div class="page-section mt-5" id="contact">
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Editar contato</h2>

            <!-- Icon Divider-->
                 
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
                
            </div>
           
            <!-- Contact Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" method="POST" action="salvar.php" enctype="multipart/form-data">
                        <input type="hidden" name="cod" value="<?=$contato['cod']?>">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..."
                                data-sb-validations="required" name="nome" value="<?= $contato['nome'] ?>" />
                            <label for="name">Nome</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">Um nome é necessário.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com"
                                data-sb-validations="required,email" value="<?= $contato['email'] ?>" name="email" />
                            <label for="email">Email</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">É necessário um email.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Esse email não é valido.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="endereco" type="text" placeholder="Rua..."
                                data-sb-validations="required" value="<?= $contato['endereco'] ?>" name=endereco>
                            <label for="email">Endereço</label>
                            <div class="invalid-feedback" data-sb-feedback="endereco:endereco">É necessário um endereço.
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890"
                                    data-sb-validations="required" value="<?= $contato['telefone'] ?>" name="telefone" />
                                <label for="phone">Número</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">É necessário um número
                                    de telefone.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="foto" type="file" placeholder="image.png"
                                    data-sb-validations="required" name="foto" value="imgs/<?= $foto ?>" />
                                <label for="name">Foto</label>
                                <div><img src="imgs/<?= $foto ?>" style="width:80px;height:80px" alt=""></div>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Requer uma foto </div>
                            </div>
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is-->
                                <!-- an error submitting the form-->
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3">Error sending message!</div>
                                </div>
                                <!-- Submit Button-->
                                <button class="btn btn-primary btn-xl" id="submitButton"
                                    type="submit">Atualizar</button>
                               
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('rodape.php') ?>
