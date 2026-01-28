@vite('resources/css/header.css')
<header>
    <span>ᔕEᖇᐯE</span>

    <nav>
        <ul>
            <li><a href="{{route('admin.statistics')}}" class="{{ request()->routeIs('admin.statistics') ? 'active' : '' }}">Statistiques</a></li>
            <li><a href="{{route('admin')}} " class="{{ request()->routeIs('admin') ? 'active' : '' }}">Ressources</a></li>
            <li><a href="{{route('admin.users')}}" class="{{ request()->routeIs('admin.users') ? 'active' : '' }}">Users</a></li>
            <li><a href="{{route('admin.hitory')}}" class="{{ request()->routeIs('admin.hitory') ? 'active' : '' }}">Historique</a></li>
            <li><a href="{{route('admin.support')}}" class="{{ request()->routeIs('admin.support') ? 'active' : '' }}">Support</a></li>
        </ul>
    </nav>

    <a href="{{route('logout')}}">Se deconnecter</a>
</header>