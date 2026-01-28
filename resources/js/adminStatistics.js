new Chart(document.getElementById("reservationChart"), {
    type: "line",
    data: {
        labels: labels,
        datasets: [
            {
                label: "Reservations",
                data: data,
                borderColor: "#2196f3",
                backgroundColor: "rgba(33,150,243,0.15)",
                tension: 0.45,
                pointRadius: 5,
                pointHoverRadius: 8,
                fill: true,
            },
        ],
    },
    options: {
        plugins: {
            legend: { display: false },
        },
        scales: {
            x: {
                grid: { display: false },
            },
            y: {
                beginAtZero: true,
                grid: { color: "#eee" },
            },
        },
    },
});
