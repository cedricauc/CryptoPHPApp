let username = document.getElementById("username")
let email = document.getElementById("email")
let password = document.getElementById("password")
let verifyPassword = document.getElementById("verifyPassword")
let fos = document.getElementById("fos")
let submitBtn = document.getElementById("submitBtn")
let emailErrorMsg = document.getElementById('emailErrorMsg')
let passwordErrorMsg = document.getElementById('passwordErrorMsg')
let usernameErrorMsg = document.getElementById('usernameErrorMsg')
let fosErrorMsg = document.getElementById('fosErrorMsg')

function displayErrorMsg(type, msg) {
    if (type === "email") {
        emailErrorMsg.style.display = "block"
        emailErrorMsg.innerHTML = msg
        submitBtn.disabled = true
    } else if (type === "username") {
        usernameErrorMsg.style.display = "block"
        usernameErrorMsg.innerHTML = msg
        submitBtn.disabled = true
    } else if (type === "fos") {
        fosErrorMsg.style.display = "block"
        fosErrorMsg.innerHTML = msg
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
    } else if (type === "username") {
        usernameErrorMsg.style.display = "none"
        usernameErrorMsg.innerHTML = ""
        submitBtn.disabled = usernameErrorMsg.innerHTML !== "";
    } else if (type === "fos") {
        fosErrorMsg.style.display = "none"
        fosErrorMsg.innerHTML = ""
        submitBtn.disabled = fosErrorMsg.innerHTML !== "";
    } else {
        passwordErrorMsg.style.display = "none"
        passwordErrorMsg.innerHTML = ""
        if (emailErrorMsg.innerHTML === "" && usernameErrorMsg.innerHTML === "" && fosErrorMsg.innerHTML === "")
            submitBtn.disabled = false
    }
}

// Valider le mot de passe lors du changement
password.addEventListener("change", function () {
    // Si le mot de passe n'a pas de valeur, il ne sera pas modifié et aucune erreur ne s'affichera
    if (password.value.length === 0 && verifyPassword.value.length === 0) hideErrorMsg("password")
    // Si le mot de passe a une valeur, il sera vérifié. Dans ce cas, les mots de passe ne correspondent pas
    else if (password.value !== verifyPassword.value) displayErrorMsg("password", "Les mots de passe ne correspondent pas")
    // Lorsque les mots de passe correspondent, nous vérifions la longueur
    else {
        // Vérifiez si le mot de passe comporte 6 caractères ou plus
        if (password.value.length >= 6)
            hideErrorMsg("password")
        else
            displayErrorMsg("password", "Le mot de passe doit contenir au moins 6 caractères")
    }
})

verifyPassword.addEventListener("change", function () {
    if (password.value !== verifyPassword.value)
        displayErrorMsg("password", "Les mots de passe ne correspondent pas")
    else {
        // Vérifiez si le mot de passe comporte 4 caractères ou plus
        if (password.value.length >= 4)
            hideErrorMsg("password")
        else
            displayErrorMsg("password", "Le mot de passe doit comporter au moins 4 caractères")
    }
})

// Valider l'email lors du changement
email.addEventListener("change", function () {
    // Vérifiez si l'e-mail est valide à l'aide d'une expression régulière (string@string.string)
    if (email.value.match(/^[^@]+@[^@]+\.[^@]+$/))
        hideErrorMsg("email")
    else
        displayErrorMsg("email", "Email invalide")
});

// Valider le nom d'utilisateur lors du changement
username.addEventListener("change", function () {
    // Si le mot de passe n'a pas de valeur, il ne sera pas modifié et aucune erreur ne s'affichera
    if (username.value.length >= 2)
        hideErrorMsg("username")
    else
        displayErrorMsg("username", "Le nom d'utilisateur doit comporter au moins 2 caractères")
});

fos.addEventListener("change", function () {
    if (fos.checked === true)
        hideErrorMsg("fos")
    else
        displayErrorMsg("fos", "Veuillez accepter les conditions d'utilisation")
})