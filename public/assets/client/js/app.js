document.addEventListener("DOMContentLoaded", function () {
    const loginButton = document.getElementById("loginButton");
    const loginButtons = document.getElementById("loginButtons");

    loginButton.addEventListener("click", function () {
        if (loginButtons.style.display === "none") {
            loginButtons.style.display = "flex";
        } else {
            loginButtons.style.display = "none";
        }
    });
});
