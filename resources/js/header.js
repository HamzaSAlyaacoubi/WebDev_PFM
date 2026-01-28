const links = document.querySelectorAll("li a");

links.forEach((link) => {
    link.addEventListener("hover", () => {
        document.querySelector(".active")?.classList.remove("active");
        link.classList.add("active");
    });
});


