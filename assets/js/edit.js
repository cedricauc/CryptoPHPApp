let username = document.getElementById("username")
let password = document.getElementById("password")
let verifyPassword = document.getElementById("verifyPassword")
let submitBtn = document.getElementById("submitBtn")
let passwordErrorMsg = document.getElementById('passwordErrorMsg')
let usernameErrorMsg = document.getElementById('usernameErrorMsg')
let profileAction = document.getElementById("profile-action")
let profileEdit = document.getElementById("profile-edit")
let profileShow = document.getElementById("profile-show")
let errorMsg = document.getElementById("errorMsg")

profileAction.addEventListener('click', function (e) {
    if (profileEdit.classList.contains('d-block')) {
        switchState(profileEdit, 'd-block', 'd-none')
        switchState(profileShow, 'd-none', 'd-block')
    } else {
        switchState(profileEdit, 'd-none', 'd-block')
        switchState(profileShow, 'd-block', 'd-none')
    }
    if (profileAction.classList.contains('fa-pen')) {
        switchState(profileAction, 'fa-pen', 'fa-times')
    } else {
        switchState(profileAction, 'fa-times', 'fa-pen')
    }
})

// fonction pour modifier le DOM
function switchState(element, classToRemove, classToAdd) {
    element.classList.remove(classToRemove)
    element.classList.add(classToAdd)
}

function displayErrorMsg(type, msg) {
    if (type === "username") {
        usernameErrorMsg.style.display = "block"
        usernameErrorMsg.innerHTML = msg
        submitBtn.disabled = true
    } else {
        passwordErrorMsg.style.display = "block"
        passwordErrorMsg.innerHTML = msg
        submitBtn.disabled = true
    }
}

function hideErrorMsg(type) {
    if (type === "username") {
        usernameErrorMsg.style.display = "none"
        usernameErrorMsg.innerHTML = ""
        submitBtn.disabled = usernameErrorMsg.innerHTML !== "";
    } else {
        passwordErrorMsg.style.display = "none"
        passwordErrorMsg.innerHTML = ""
        if (usernameErrorMsg.innerHTML === "")
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

// Valider le nom d'utilisateur lors du changement
username.addEventListener("change", function () {
    // Si le mot de passe n'a pas de valeur, il ne sera pas modifié et aucune erreur ne s'affichera
    if (username.value.length >= 2)
        hideErrorMsg("username")
    else
        displayErrorMsg("username", "Le nom d'utilisateur doit comporter au moins 2 caractères")
});
