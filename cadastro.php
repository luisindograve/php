    <?php include('topo.php') ?>
    <?php include('menu.php') ?>
        <section class="page-section mt-5" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Cadastro de Contatos</h2>
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
                        <form method="POST" action="cadastrar.php" enctype="multipart/form-data">
                            <!-- Nome input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Entre com seu nome..." data-sb-validations="required" name="nome" />
                                <label for="name">Nome Completo</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">O nome é obrigatório.</div>
                            </div>
                            <!-- Email  input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@exemplo.com" data-sb-validations="required,email" name="email" />
                                <label for="email">Email</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">O Email é obrigatório.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Esse Email não é válido.</div>
                            </div>
                            <!-- Telefone  input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" name="telefone" />
                                <label for="phone">Telefone</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">O telefone é obrigatório.</div>
                            </div>
                            <!-- Endereço number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="text" placeholder="Digite sua rua e número aqui" data-sb-validations="required" name="endereco" />
                                <label for="endereço">Endereço</label>
                                <div class="invalid-feedback">O Endereço é obrigatório.</div>
                            </div>
                            <!-- Foto number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="file" data-sb-validations="required" name="foto" />
                                <label for="foto">Foto</label>
                                <div class="invalid-feedback"></div>
                            </div>
                            
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl " id="submitButton" type="submit">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php include('rodape.php') ?>