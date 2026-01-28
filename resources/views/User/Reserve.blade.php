<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Data Center - Réservation</title>
    @vite('resources/css/reserve.css')
</head>

<body>
    @include('include.header')
    <main>
        <section>
            <h1>Demande de réservation</h1>

            <form method="POST" action="{{ route('reservations.store') }}">
                @csrf

                <!-- ID de la ressource caché -->
                <input type="hidden" name="id_category" value="{{ $resource->id_category }}">
                <input type="hidden" name="id_resource" value="{{ $resource->id }}">
                <input type="hidden" name="id_user" value="{{ Auth::id() }}">

                <fieldset>
                    <legend>Ressource</legend>

                    <h3>{{ $resource->name }}</h3>

                    <ul>
                        @if($resource->id_category == 1)
                        <li>Catégorie : {{ $resource->brand }}</li>
                        <li>CPU : {{ $resource->cpu ?? '—' }}</li>
                        <li>RAM : {{ $resource->ram ?? '—' }}</li>
                        <li>Stockage : {{ $resource->storage ?? '—' }}</li>
                        <li>Disque : {{ $resource->storage_type ?? '—' }}</li>
                        <li>OS : {{ $resource->os ?? '—' }}</li>
                        <li>Location: {{ $resource->location ?? '—' }}</li>
                        <li>Quantity Available: {{ $resource->quantity_available ?? '—' }}</li>
                        @elseif($resource->id_category == 2)
                        <li>Name : {{ $resource->name }}</li>
                        <li>CPU : {{ $resource->cpu ?? '—' }}</li>
                        <li>RAM : {{ $resource->ram ?? '—' }}</li>
                        <li>Storage : {{ $resource->storage ?? '—' }}</li>
                        <li>Storage Type : {{ $resource->storage_type ?? '—' }}</li>
                        <li>OS : {{ $resource->os ?? '—' }}</li>
                        <li>IP Address : {{ $resource->ip_address ?? '—' }}</li>
                        <li>Server Hote: {{ $resource->server_hote ?? '—' }}</li>
                        <li>Quantity Available: {{ $resource->quantity_available ?? '—' }}</li>
                        @elseif($resource->id_category == 3)
                        <li>Brand: {{ $resource->brand ?? '—' }}</li>
                        <li>Type: {{ $resource->type ?? '—' }}</li>
                        <li>Model: {{ $resource->model ?? '—' }}</li>
                        <li>Port: {{ $resource->port_number ?? '—' }}</li>
                        <li>Speed: {{ $resource->speed ?? '—' }}</li>
                        <li>Quantity Available: {{ $resource->quantity_available ?? '—' }}</li>
                        @elseif($resource->id_category == 4)
                        <li>Brand: {{ $resource->brand ?? '—' }}</li>
                        <li>Capacity: {{ $resource->capacity ?? '—' }}</li>
                        <li>Type: {{ $resource->type ?? '—' }}</li>
                        <li>Speed: {{ $resource->speed ?? '—' }}</li>
                        <li>Quantity Available: {{ $resource->quantity_available ?? '—' }}</li>
                        @endif
                    </ul>
                </fieldset>

                <fieldset>
                    <legend>Période de réservation</legend>

                    <label>Date de début :</label>
                    <input type="date" name="start_date" required>

                    <label>Date de fin :</label>
                    <input type="date" name="end_date" required>
                </fieldset>

                <fieldset>
                    <legend>Justification</legend>

                    <textarea class="area" name="justification" placeholder="Write your justification" required></textarea>
                </fieldset>

                <button type="submit">Confirmer</button>
            </form>
        </section>
    </main>

    @include('include.footer')

</body>

</html>