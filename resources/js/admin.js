const containers = document.querySelectorAll(".container");
const createResponsableBtn = document.getElementById("create-responsable-btn");

createResponsableBtn.addEventListener("click", () => {
    containers.forEach((container) => {
        container.classList.remove("active");
    });

    const target = document.getElementById("create-responsable-form-container");

    target.classList.add("active");
});
