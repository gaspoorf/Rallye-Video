// Show and hide the password
function showHidePwd(element, launcher) {
    if (element.type === "password") {
        element.type = "text";
        launcher.innerHTML = "Masquer le mot de passe";
    } else {
        element.type = "password";
        launcher.innerHTML = "Afficher le mot de passe";
    }
}

const showHideElement = document.getElementById("show-hide");
const pwd = document.getElementById("password");

showHideElement.addEventListener("click", function() {
    showHidePwd(pwd, showHideElement);
});
