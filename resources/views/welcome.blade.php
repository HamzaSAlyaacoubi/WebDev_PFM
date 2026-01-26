<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="home.css"> -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <title>Data Center</title>
</head>

<body>
    <header id="header">
        <div id="h1"><span>ᔕEᖇᐯE</span>
            <nav id="headlist">
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#services-container">Ressources</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>

        </div>

        <div id="h2"><span>Smart<br><br>Infrastructure</span></div>

        <div id="h3">
            <p>Reliable servers, secure storage, and optimized performance—all in one place. Our data center solutions are designed to keep your data available, protected, and scalable as your needs grow.</p>
            <a href="{{route('login')}}"><button id="login">Login</button></a>
        </div>

        <img src="{{asset('images/pngegg.png')}}" alt="">

        <div id="blur">
            <p class="blur-this">We believe that in a world</p>
            <p class="blur-this">where data is critical,</p>
            <p class="blur-this">reliable infrastructure</p>
            <p class="blur-this">is the foundation of</p>
            <p class="blur-this">every successful digital</p>
            <p class="blur-this"><strong> system.</strong> </p>
        </div>

        <div class="details one">
            <h2>High Availability</h2>
            <p>Your services stay online with redundant systems and optimized uptime designed for critical workloads.</p>
        </div>
        <div class="details two">
            <h2>Secure Infrastructure</h2>
            <p>Enterprise-grade security measures protect your data, networks, and access at every level.</p>
        </div>

    </header>


    <main id="main">


        <section id="services-container" class="bpart2">
            <h2>Nos Services :</h2>
            <div class="services">

                <div class="service">
                    @foreach ($categories as $category)
                    @if($category->id == 1)
                    <img class="imgs" src="images/lee-soo-hyun-iFyJfU4D2Tg-unsplash.jpg" alt="Serveurs physiques" id="server">
                    <a href="{{ route('categories.index', $category->id) }}">
                        <img class="icon" src="{{asset('images/servers.png')}}" alt="">
                        @endif
                        @endforeach
                        <label class="txt" for="server">Serveurs physiques</label>
                    </a>
                </div>
                <div class="service">
                    @foreach ($categories as $category)
                    @if($category->id == 2)
                    <img class="imgs" src="images/Gemini_Generated_Image_adrgd8adrgd8adrg.png" alt="Machines virtuelles" id="machine">
                    <a href="{{ route('categories.index', $category->id) }}">
                        <img class="icon" src="{{asset('images/ar.png')}}" alt="">
                        @endif
                        @endforeach
                        <label class="txt" for="machine">Machines virtuelles</label>
                    </a>
                </div>
                <div class="service">
                    @foreach ($categories as $category)
                    @if($category->id == 4)
                    <img class="imgs" src="images/matthieu-beaumont-iYnpYeyu57k-unsplash.jpg" alt="Bloc de stockage" id="stockage">
                    <a href="{{ route('categories.index', $category->id) }}">
                        <img class="icon" src="images/memory.png" alt="">
                        @endif
                        @endforeach
                        <label class="txt" for="stockage">Bloc de stockage</label>
                    </a>
                </div>
                <div class="service">
                    @foreach ($categories as $category)
                    @if($category->id == 3)
                    <img class="imgs" src="images/joshua-quilala-RXn-uTxKBtQ-unsplash.jpg" alt="Réseau" id="reseau">
                    <a href="{{ route('categories.index', $category->id) }}">
                        <img class="icon" src="images/electrical.png" alt="">
                        @endif
                        @endforeach
                        <label class="txt" for="reseau">Equipement réseau</label>
                    </a>
                </div>
            </div>
        </section>

    </main>

    <footer id="contact">
        <h1>Contact</h1>

        <span>Nos reseaux sociaux</span>
        <ul class="reseaux">
            <li id="logoInsta"><a href="https://www.instagram.com"><img src="images/instagram.jpeg" alt="Logo Instagram" width="50" height="50"></a></li>
            <li id="logoFb"><a href="https://www.facebook.com"><img src="images/facebook.jpeg" alt="Logo Facebook" width="50" height="50"></a></li>
            <li id="logoTik"><a href="https://www.tiktok.com"><img src="images/tikTok.jpeg" alt="Logo TikTok" width="50" height="50"></a></li>
            <li id="logoWatts"><a href="tel:+212660750696"><img src="images/whatsApp.jpeg" alt="Logo WhatsApp" width="50" height="50"></a></li>

            <p id="contactLink"><a href="mailto:contact@datacenter.ma">contact@datacenter.ma</a></p>
            <p>&copy; 2024 Data Center. Tous droits réservés.</p>
    </footer>
</body>

</html>