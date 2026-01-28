<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    @vite('resources/css/adminStatistics.css')
    @vite('resources/js/adminStatistics.js')

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    @include('include.adminHeader')
    <main class="dashboard">

        <section class="dashboard-header">
            <h1>Dashboard Statistics</h1>
            <p>Welcome back, {{ auth()->user()->name }}</p>
        </section>

        <!-- OCCUPATION -->
        <section class="card">
            <div class="card-header">
                <h2>📊 Data Center Occupation</h2>
            </div>

            <div class="stats-container">
                <div class="stat-circle" style="--percent: {{ $occupationGlobal }};">
                    <span>{{ number_format($occupationGlobal, 1) }}%</span>
                    <p>Global</p>
                    <small>{{ $usedResources }} / {{ $totalResources }}</small>
                </div>

                <div class="stat-circle blue" style="--percent: {{ $occupationServers }};">
                    <span>{{ number_format($occupationServers, 1) }}%</span>
                    <p>Servers</p>
                    <small>{{ $usedServers }} / {{ $totalServers }}</small>
                </div>

                <div class="stat-circle purple" style="--percent: {{ $occupationVms }};">
                    <span>{{ number_format($occupationVms, 1) }}%</span>
                    <p>VMs</p>
                    <small>{{ $usedVms }} / {{ $totalVms }}</small>
                </div>

                <div class="stat-circle orange" style="--percent: {{ $occupationNetworks }};">
                    <span>{{ number_format($occupationNetworks, 1) }}%</span>
                    <p>Networks</p>
                    <small>{{ $usedNetworks }} / {{ $totalNetworks }}</small>
                </div>

                <div class="stat-circle red" style="--percent: {{ $occupationStorages }};">
                    <span>{{ number_format($occupationStorages, 1) }}%</span>
                    <p>Storages</p>
                    <small>{{ $usedStorages }} / {{ $totalStorages }}</small>
                </div>
            </div>
        </section>

        <section class="double-card-container">
            <!-- RESERVATIONS -->
            <section class="card reservations-card">
                <div class="card-header">
                    <h2>📈 Reservations Evolution</h2>

                    <form method="GET">
                        <select name="type" onchange="this.form.submit()">
                            <option value="day" {{ $type == 'day' ? 'selected' : '' }}>Day</option>
                            <option value="week" {{ $type == 'week' ? 'selected' : '' }}>Week</option>
                            <option value="month" {{ $type == 'month' ? 'selected' : '' }}>Month</option>
                        </select>
                    </form>
                </div>

                <canvas id="reservationChart"></canvas>

                <script>
                    const labels = @json($reservationLabels);
                    const data = @json($reservationData);

                    new Chart(document.getElementById('reservationChart'), {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Nombre de réservations',
                                data: data,
                                borderColor: '#4CAF50',
                                backgroundColor: 'rgba(76, 175, 80, 0.2)',
                                tension: 0.4,
                                pointRadius: 4,
                                pointBackgroundColor: '#4CAF50',
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    labels: {
                                        font: {
                                            size: 14
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    ticks: {
                                        color: '#555'
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        color: '#555'
                                    }
                                }
                            }
                        }
                    });
                </script>
            </section>

            <!-- USERS -->
            <section class="card reservations-card">
                <div class="card-header">
                    <h2>👥 Répartition des utilisateurs</h2>
                </div>

                <div class="chart-card">
                    <canvas id="usersRoleChart"></canvas>

                    <script>
                        const roleLabels = @json($rolesLabels);
                        const roleData = @json($rolesData);

                        new Chart(document.getElementById('usersRoleChart'), {
                            type: 'doughnut',
                            data: {
                                labels: roleLabels,
                                datasets: [{
                                    data: roleData,
                                    backgroundColor: [
                                        '#90caf9',
                                        '#81c784',
                                        '#ffb74d',
                                        '#e57373'
                                    ],
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }
                        });
                    </script>

                </div>
            </section>
        </section>

        <!-- ACTIVE USERS -->
        <div class="card-header">
            <h2>🧑‍💻 Utilisateurs les plus actifs</h2>
        </div>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Réservations</th>
                        <th>Heures cumulées</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topUsers as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->total_reservations }}</td>
                        <td>{{ $user->total_hours ?? 0 }} h</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </main>


</body>

</html>