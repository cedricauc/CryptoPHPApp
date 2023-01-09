<link href="<?php echo '/assets/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">

<?php require $header ?></body>

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
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text"
                                                                      placeholder="Email" name="email" required=""></div>
                            <div class="col-sm-6"><input class="form-control form-control-user" type="password"
                                                         placeholder="Password" name="password" required=""></div>
                        </div>
                        <div class="row mb-3">
                            <?php if($message) : ?>
                                <p class="text-danger"><?= $message ?></p>
                            <?php endif ?>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0"></div>
                            <div class="col-sm-6">
                                <button class="btn btn-primary d-block btn-user w-100" id="submitBtn" type="submit">Se
                                    connecter
                                </button>
                            </div>
                        </div>

                        <hr>
                    </form>
                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
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
                        <div class="mb-3"><input class="form-control form-control-user" type="text"
                                                 placeholder="Nom d'utilisateur" name="username" required=""></div>
                        <div class="mb-3"><input class="form-control form-control-user" type="email" id="email"
                                                 placeholder="Adresse Email" name="email" required=""></div>
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user"
                                                                      type="password" id="password"
                                                                      placeholder="Mot de passe" name="password" required=""></div>
                            <div class="col-sm-6"><input class="form-control form-control-user" type="password"
                                                         id="verifyPassword" placeholder="Confirmer mot de passe" name="confirm"
                                                         required=""></div>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                            <label class="check">J'accepte les conditions d'utilisations</label>
                        </div>
                        <div class="row mb-3">
                            <p id="emailErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                            <p id="passwordErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                        </div>
                        <button class="btn btn-primary d-block btn-user w-100" id="submitBtn-1" type="submit">Register
                            Account
                        </button>
                        <hr>
                    </form>

                    <div class="text-center"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let email = document.getElementById("email")
    let password = document.getElementById("password")
    let verifyPassword = document.getElementById("verifyPassword")
    let submitBtn = document.getElementById("submitBtn")
    let emailErrorMsg = document.getElementById('emailErrorMsg')
    let passwordErrorMsg = document.getElementById('passwordErrorMsg')

    function displayErrorMsg(type, msg) {
        if (type === "email") {
            emailErrorMsg.style.display = "block"
            emailErrorMsg.innerHTML = msg
            submitBtn.disabled = true
        } else {
            passwordErrorMsg.style.display = "block"
            passwordErrorMsg.innerHTML = msg
            submitBtn.disabled = true
        }
    }

    function hideErrorMsg(type) {
        if (type === "email") {
            emailErrorMsg.style.display = "none"
            emailErrorMsg.innerHTML = ""

            submitBtn.disabled = passwordErrorMsg.innerHTML !== "";
        } else {
            passwordErrorMsg.style.display = "none"
            passwordErrorMsg.innerHTML = ""
            if (emailErrorMsg.innerHTML === "")
                submitBtn.disabled = false
        }
    }

    // Validate password upon change
    password.addEventListener("change", function () {

        // If password has no value, then it won't be changed and no error will be displayed
        if (password.value.length === 0 && verifyPassword.value.length === 0) hideErrorMsg("password")

        // If password has a value, then it will be checked. In this case the passwords don't match
        else if (password.value !== verifyPassword.value) displayErrorMsg("password", "Passwords do not match")

        // When the passwords match, we check the length
        else {
            // Check if the password has 6 characters or more
            if (password.value.length >= 6)
                hideErrorMsg("password")
            else
                displayErrorMsg("password", "Password must be at least 6 characters long")
        }
    })

    verifyPassword.addEventListener("change", function () {
        if (password.value !== verifyPassword.value)
            displayErrorMsg("password", "Passwords do not match")
        else {
            // Check if the password has 8 characters or more
            if (password.value.length >= 8)
                hideErrorMsg("password")
            else
                displayErrorMsg("password", "Password must be at least 8 characters long")
        }
    })

    // Validate email upon change
    email.addEventListener("change", function () {
        // Check if the email is valid using a regular expression (string@string.string)
        if (email.value.match(/^[^@]+@[^@]+\.[^@]+$/))
            hideErrorMsg("email")
        else
            displayErrorMsg("email", "Invalid email")
    });
</script>

<?php require $footer ?></body>