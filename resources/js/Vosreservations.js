const btns = document.querySelectorAll('.reservation-row .details');
btns.forEach(btn => {
    btn.addEventListener('click', () => {
        const row = btn.closest('.reservation-row');
        const details = row.querySelector('.show');
        details.classList.toggle('active');
    });
});