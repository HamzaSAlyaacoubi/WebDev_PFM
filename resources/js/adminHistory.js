const detailsBtns = document.querySelectorAll(".reservation-row .details-btn");
detailsBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        const row = btn.closest(".reservation-row");
        const details = row.querySelector(".show");
        details.classList.toggle("active");

    });
});

const statusSpans = document.querySelectorAll(".status");
statusSpans.forEach((span) => {
    if (span.textContent == "accepted") {
        span.classList.add("active");
        span.textContent = "active";
    } else if (span.textContent == "pending") {
        span.classList.remove("active");
        span.classList.add("maintenance");
    } else if (span.textContent == "rejected") {
        span.classList.remove("active");
        span.classList.add("expired");
    }
});
