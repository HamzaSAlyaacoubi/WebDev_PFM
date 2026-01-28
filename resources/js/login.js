const container = document.querySelector(".container");
const registerBtn = document.querySelector(".register-btn");
const loginBtn = document.querySelector(".login-btn");
const loginErrorMessage = document.querySelectorAll(".login-error");
const registerErrorMessage = document.querySelectorAll(".registration-error");

registerBtn.addEventListener("click", () => {
    container.classList.add("active");
    loginErrorMessage.forEach((message) => {
        message.classList.add("hidden");
    });
});

loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
    registerErrorMessage.forEach((message) => {
        message.classList.add("hidden");
    });
});
