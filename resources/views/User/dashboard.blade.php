
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/dashboard.css')
        <title>Data Center</title>
    </head>
    <body>
        <header>
            <span>ᔕEᖇᐯE</span>  
            
            <nav>
                <ul>
                    <li><a href="home_user.php">Accueil</a></li>
                    <li><a href="ressources_user.php">Ressources</a></li>
                    <li><a href="suivis.php">Vos reservations</a></li>
                    <li><a href="history.php">Historique</a></li>
                    <li><a href="signaler.php">Support</a></li>
                    <li><a href=#contact>Contact</a></li>
                </ul>
            </nav>
            
            
            
            <a href="{{route('logout')}}">Se deconnecter</a>
        </header>
        
        <main>
            <section class="resources">
                
                <h1>Nos ressources</h1>
                
                <form method="GET" action="{{ route('dashboard') }}">
                    
                    <input type="text" placeholder="Search" name="search" value="{{ request('search') }}"> 
                    <!-- Filtre par type -->
                    <select name="filter" >
                        <option value="all">All Categories</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"{{ request('filter') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>

                <select name="manufacturer">
                        <option value="all">All Manufacturers</option>
    
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->manufacturer }}"{{ request('manufacturer') == $manufacturer->manufacturer ? 'selected' : '' }}>
                                {{ $manufacturer->manufacturer }}
                            </option>
                        @endforeach
                    </select>

                <button type="submit">Chercher</button>
            </form>

            <div>
                <!-- juste example je pense l'ajout d'autres ressources peut etre fait par laravel avec la base de données -->
                 @foreach($ressources as $ressource)
                <div>
                    <span class="Disponible">{{ $ressource->status }}</span>

                    <div class="imgs"><img src="{{ asset($ressource->image) }}" alt="{{ $ressource->name }}"></div>

                    <h3>{{ $ressource->name }}</h3>

                    <ul>
                        <li>CPU : {{ $ressource->cpu }} cœurs</li>
                        <li>RAM : {{ $ressource->ram }} Go</li>
                        <li>Stockage : {{ $ressource->storage }} To SSD</li>
                        <li>OS : {{ $ressource->os }}</li>
                    </ul>

                    <a href="{{ route('reserve', $ressource->id) }}">Réserver</a> <!-- disabled car indisponible-->
                </div>
                @endforeach
               
        </section>

    </main>

    <footer id="contact">
        <h1>Contact</h1>

        <span>Nos reseaux sociaux</span>
        <ul>
            <!-- deplacer images au dossier public et utiliser asset() -->
            <li><a href="https://www.instagram.com"><img src="../images/instagram.jpeg" alt="Logo Instagram" width="50" height="50"></a></li>
            <li><a href="https://www.facebook.com"><img src="../images/facebook.jpeg" alt="Logo Facebook" width="50" height="50"></a></li>
            <li><a href="https://www.tiktok.com"><img src="../images/tikTok.jpeg" alt="Logo TikTok" width="50" height="50"></a></li>
            <li><a href="tel:+212660750696"><img src="../images/whatsApp.jpeg" alt="Logo WhatsApp" width="50" height="50"></a></li>
        </ul>

        <p><a href="mailto:contact@datacenter.ma">contact@datacenter.ma</a></p>

        <p>&copy; 2026 Data Center. Tous droits réservés.</p>

    </footer>
    
    
</body>
</html>
