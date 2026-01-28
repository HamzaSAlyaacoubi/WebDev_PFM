<fieldset>
    <form class="search-form" method="GET" action="{{ route('responsable.search') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher">
        <select name="brand">
            <option value="">All brands</option>
            @foreach($brands as $brand)
            <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                {{ $brand }}
            </option>
            @endforeach
        </select>
        <button type="submit">Search</button>
    </form>

</fieldset>