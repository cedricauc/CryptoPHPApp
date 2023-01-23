<link href="<?php echo '/assets/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">

<?php require $header ?></body>
<div id="wrapper">
    <section class="bg-secondary pt-10 pb-5">
        <div class="container">
            <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
                <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7"
                     style="border-radius: 5px;background: rgba(255,255,255,0);">
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="text-dark mb-4">Se connecter</h4>
                        </div>
                        <form class="user" method="post" action="/login">
                            <div class="mb-3"></div>
                            <div class="mb-3"></div>
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user"
                                                                          type="text"
                                                                          placeholder="Email" name="email1" required="">
                                </div>
                                <div class="col-sm-6"><input class="form-control form-control-user" type="password"
                                                             placeholder="Password" name="password1" required=""></div>
                            </div>
                            <div class="row mb-3">
                                <?php if (isset($login_message)) : ?>
                                    <p class="text-danger"><?= $login_message ?></p>
                                <?php endif ?>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0"></div>
                                <div class="col-sm-6">
                                    <button class="btn btn-primary d-block btn-user w-100" id="submitBtn1"
                                            type="submit">Se
                                        connecter
                                    </button>
                                </div>
                            </div>

                            <hr>
                        </form>
                        <!--                    <div class="text-center"><a class="small" href="forgot-password.html">Mot de passe oublié?</a></div>-->
                        <div class="text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-secondary pt-5 pb-10">
        <div class="container">
            <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
                <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7"
                     style="border-radius: 5px;background: rgba(255,255,255,0);">
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="text-dark mb-5">Ou</h4>
                        </div>
                        <div class="text-center">
                            <h4 class="text-dark mb-4">Créer un compte</h4>
                        </div>
                        <form class="user" method="post" action="/register">
                            <div class="mb-3"><input class="form-control form-control-user" type="text" id="username"
                                                     placeholder="Nom d'utilisateur" name="username" required=""></div>
                            <div class="mb-3"><input class="form-control form-control-user" type="email" id="email"
                                                     placeholder="Adresse Email" name="email" required=""></div>
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user"
                                                                          type="password" id="password"
                                                                          placeholder="Mot de passe" name="password"
                                                                          required=""></div>
                                <div class="col-sm-6"><input class="form-control form-control-user" type="password"
                                                             id="verifyPassword" placeholder="Confirmer mot de passe"
                                                             name="verify"
                                                             required=""></div>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" id="fos" value="2">
                                <span class="checkmark"></span>
                                <label class="check">J'accepte les conditions d'utilisation</label>
                            </div>
                            <div class="row mb-3">
                                <p id="emailErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                                <p id="passwordErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                                <p id="usernameErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                                <p id="fosErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                                <?php if (isset($register_message)) : ?>
                                    <p class="text-danger"><?= $register_message ?></p>
                                <?php endif ?>
                            </div>
                            <button class="btn btn-primary d-block btn-user w-100" id="submitBtn" type="submit">Créer un
                                compte
                            </button>
                            <hr>
                        </form>

                        <div class="text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="/assets/js/register.js"></script>
<?php require $footer ?></body>