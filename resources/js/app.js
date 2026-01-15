const elements = document.querySelectorAll(".blur-this");

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            entry.target.classList.toggle("active", entry.isIntersecting);
        });
    },
    {
        // threshold: [0.2, 0.8]
    }
);

elements.forEach((el) => observer.observe(el));
