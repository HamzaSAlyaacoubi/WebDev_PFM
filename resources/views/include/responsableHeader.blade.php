@vite('resources/css/header.css')
<header>
    <span>ᔕEᖇᐯE</span>

    <nav>
        <ul>
            <li><a href="{{route('responsable')}}" class="{{ request()->routeIs('responsable') ? 'active' : '' }}">Ressources</a></li>
            <li><a href="{{route('responsable.reservations')}}" class="{{ request()->routeIs('responsable.reservations') ? 'active' : '' }}">Reservations</a></li>
            <li><a href="{{route('responsable.hitory')}}" class="{{ request()->routeIs('responsable.hitory') ? 'active' : '' }}">Historique</a></li>
            <li><a href="{{route('responsable.reclamations')}}" class="{{ request()->routeIs('responsable.reclamations') ? 'active' : '' }}">Reclamations</a></li>
        </ul>
    </nav>

    <a href="{{route('logout')}}">Se deconnecter</a>
</header>