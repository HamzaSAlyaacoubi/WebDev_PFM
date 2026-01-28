@vite('resources/css/header.css')
<header>
    <span>ᔕEᖇᐯE</span>

    <nav>
        <ul>
            <li><a href="{{route('dashboard')}}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Ressources</a></li>
            <li><a href="{{route('vosreservations')}}" class="{{ request()->routeIs('vosreservations') ? 'active' : '' }}">Vos reservations</a></li>
            <li><a href="{{route('history')}}" class="{{ request()->routeIs('history') ? 'active' : '' }}">Historique</a></li>
            <li><a href="{{route('support')}}" class="{{ request()->routeIs('support') ? 'active' : '' }}">Support</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <a href="{{route('logout')}}">Se deconnecter</a>
</header>