const statusSpans = document.querySelectorAll(".status");
statusSpans.forEach((span) => {
    if (span.textContent == "accepted") {
        span.classList.add("completed");
    } else if (span.textContent == "rejected") {
        span.classList.add("canceled");
    }
});
