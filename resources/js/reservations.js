const detailsBtns = document.querySelectorAll(".details-btn");
const detailsLists = document.querySelectorAll(".details");

detailsBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        const details = btn.closest(".reservation-row").nextElementSibling;
        const reservation = btn.closest(".reservation-row");

        if (!details) return;

        details.classList.toggle("show");
        reservation.classList.toggle("show");

        btn.textContent = details.classList.contains("show")
            ? "Hide Details"
            : "Voir Details";
    });
});
