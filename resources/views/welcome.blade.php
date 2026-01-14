<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Center</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <header id="header">
        <div id="h1"><span>ᔕEᖇᐯE</span>
            <nav id="headlist">
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Ressources</a></li>
                    <li><a href=#contact>Contact</a></li>
                </ul>
            </nav>

            <a id="seconnecter" href="login.html">Se connecter</a>
        </div>

        <div id="h2"><span>Make <br><br>New Friends </span></div>

        <div id="h3">
            <p>Friends are the family we choose, offering support, laughter, and shared memories<br> that enrich our lives. True friendship is built on trust,
                <br> understanding, and the comfort .
            </p>
            <a href="{{route('registration')}}"><button id="login">S'inscrire</button></a>
        </div>

        <img src="images/pngegg.png" alt="">

        <div id="blur">
            <p class="blur-this">We believe that in a world</p>
            <p class="blur-this">where passengers have</p>
            <p class="blur-this">become numbers, a</p>
            <p class="blur-this">personal approach is key</p>
            <p class="blur-this">to ensure you get the</p>
            <p class="blur-this">best <strong>experience.</strong> </p>
        </div>

        <div class="details one">
            <h2>Flexible Solutions</h2>
            <p>Stop depending on airlines. Fly on your own terms or join our exclusive shared flights.</p>
        </div>
        <div class="details two">
            <h2>Flexible Solutions</h2>
            <p>Stop depending on airlines. Fly on your own terms or join our exclusive shared flights.</p>
        </div>

    </header>


    <main id="main">


        <section class="bpart2">
            <h2>Nos Services :</h2>
            <div class="services">
                <div class="service">
                    @foreach ($categories as $category)
                    @if($category->id == 1)
                    <a href="{{ route('categories.index', $category->id) }}"><img src="images/lee-soo-hyun-iFyJfU4D2Tg-unsplash.jpg" alt="Serveurs physiques" id="server"></a>
                    <img id="im1" src="images/servers.png" alt="">
                    @endif
                    @endforeach
                    <label id="txt1" for="server">Serveurs physiques</label>
                </div>
                <div class="service">
                    @foreach ($categories as $category)
                    @if($category->id == 2)
                    <a href="{{ route('categories.index', $category->id) }}"><img src="images/Gemini_Generated_Image_adrgd8adrgd8adrg.png" alt="Machines virtuelles" id="machine"></a>
                    <img id="im2" src="images/ar.png" alt="">
                    @endif
                    @endforeach
                    <label id="txt2" for="machine">Machines virtuelles</label>
                </div>
                <div class="service">
                    @foreach ($categories as $category)
                    @if($category->id == 4)
                    <a href="{{ route('categories.index', $category->id) }}"><img src="images/matthieu-beaumont-iYnpYeyu57k-unsplash.jpg" alt="Bloc de stockage" id="stockage"></a>
                    <img id="im3" src="images/memory.png" alt="">
                    @endif
                    @endforeach
                    <label id="txt3" for="stockage">Bloc de stockage</label>
                </div>
                <div class="service">
                    @foreach ($categories as $category)
                    @if($category->id == 3)
                    <a href="{{ route('categories.index', $category->id) }}"><img src="images/joshua-quilala-RXn-uTxKBtQ-unsplash.jpg" alt="Réseau" id="reseau"></a>
                    <img id="im4" src="images/electrical.png" alt="">
                    @endif
                    @endforeach
                    <label id="txt4" for="reseau">Equipement réseau</label>
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


    <script src="home.js"></script>
</body>

</html>
<a href="{{route('login')}}" class="btn"><button id="login">Login</button></a>
<a href="{{route('registration')}}" class="btn"><button id="Register">Register</button></a>