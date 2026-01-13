<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="home.css"> -->
    @vite('resources/css/app.css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: rgb(255, 255, 255);
            line-height: 1rem;
            font-family: Arial, Helvetica, sans-serif;
            background-size: cover;
            position: relative;
        }

        #header {
            min-height: 100vh;
            width: 100%;
            background-image: linear-gradient(to bottom,
                    rgba(79, 79, 172, 0.707),
                    transparent);
        }

        #h1 {
            width: 100%;
            display: flex;
            justify-content: space-between;
            /* align-items: flex-start; */
            padding: 0 5rem;
            padding-top: 1.5rem;
            padding-right: 7rem;
            padding-bottom: 6rem;
            /* background-color: red; */
        }

        #h2 {
            /* background-color: blue; */
            /* position: absolute; */
            /* text-align: start; */
            /* right: 6rem;
            top: 20rem; */
            padding: 2rem;
            padding-left: 70%;
            font-size: 1.5cm;
            /* font-weight: 700; */
            font-family: Georgia, Times, "Times New Roman", serif;
            line-height: 2rem;
        }

        #h3 {
            text-align: start;
            padding-left: 70%;
            /* font-weight: 700; */
            font-family: Georgia, Times, "Times New Roman", serif;
            line-height: 2rem;
        }

        #h3 button {
            border: 0;
            background-color: rgba(137, 43, 226, 0.373);
            color: white;
            font-size: 1.5rem;
            font-family: Times, serif;
            border-radius: 15px;
            border-top-right-radius: 0;
            padding: 0.6rem 2.5rem;
            transition: all 0.3s ease;
        }

        #login {
            margin-right: 1.2rem;
            margin-left: 0.2rem;
        }

        #h3 button:hover {
            cursor: pointer;
            /* border-top-right-radius: 15px; */
            border-radius: 20px;
            box-shadow: 1px 1px 3px -1px rgba(59, 6, 82, 0.355);
            transform: translateY(-1px);
            background-color: rgb(255, 255, 255);
            color: rgba(137, 43, 226, 0.373);
        }

        #h3 p {
            line-height: 1.2rem;
            font-family: monospace;
            padding-bottom: 1rem;
            padding-left: 0.3rem;
        }

        #headlist ul {
            /* background-color: red; */

            display: flex;
            justify-content: space-between;
            list-style: none;
            gap: 3rem;
            margin-left: 10rem;
            margin-top: 2.2rem;
        }

        #seconnecter {
            /* background-color: red; */
            height: fit-content;
            padding: 0.3rem 0;
            /* margin: -0.3rem 0 5rem 0; */
            margin-top: 2rem;
        }

        a {
            /* background-color: brown; */
            text-decoration: none;
            font-size: 0.6cm;
            font-weight: 500;
            color: rgba(0, 0, 0, 0.907);
            letter-spacing: 1px;
            position: relative;
        }

        a::before {
            content: "";
            width: 0;
            height: 1px;
            position: absolute;
            bottom: 0px;
            left: 0;
            background-color: rgb(40, 40, 40);
            color: rgb(44, 44, 44);
            transition: all 0.3s ease;
        }

        a:hover::before {
            width: 100%;
            transform: translateX(100);
        }

        .btn:hover:before {
            width: 0%;
        }

        #h1 span {
            font-size: 3cm;
            color: rgb(2, 11, 41);
            margin-top: 4rem;
            margin-left: 1.5rem;
        }
    </style>

    <title>Data Center</title>
</head>

<body>
    <header id="header">
        <div id="h1"><span>ᔕEᖇᐯE</span>
            <nav id="headlist">
                <ul>
                    <li><a href="home.html">Accueil</a></li>
                    <li><a href="guest/ressources_guest.php">Ressources</a></li>
                    <li><a href=#contact>Contact</a></li>
                </ul>
            </nav>

            <a id="seconnecter" href="login.html">Se connecter</a>
        </div>

        <div id="h2"><span>Welcome <br><br>Mr.{{auth()->user()->name}} </span></div>

        <div id="h3">
            <p>Friends are the family we choose, offering support, laughter, and shared memories<br> that enrich our lives. True friendship is built on trust,
                <br> understanding, and the comfort .
            </p>
            <a href="{{route('logout')}}" class="btn"><button>Logout</button></a>

        </div>

        <div><img src="images/pngegg.png" alt=""></div>


    </header>





    <!-- <main id="main">
        <section class="bpart 1">
            

            <div id="welcome">
                <h1>Bienvenue au Data Center</h1>
                <p>Votre source fiable pour les ressources informatiques et les solutions de stockage de données.</p>
                <a href="guest/ressources_guest.php">Explorer</a>
            </div>
        </section>

        <section class="bpart 2">
            <h2>Nos Services :</h2>
            <div class="services">
                <div class="service">
                    <a href="guest/ressources_guest.php"><img src="" alt="Serveurs physiques" id="server"></a>
                    <label for="server">Serveurs physiques</label>
                </div>
                <div class="service">
                    <a href="guest/ressources_guest.php"><img src="" alt="Machines virtuelles" id="machine"></a>
                    <label for="machine">Machines virtuelles</label>
                </div>
                <div class="service">
                    <a href="guest/ressources_guest.php"><img src="" alt="Bloc de stockage" id="stockage"></a>
                    <label for="stockage">Bloc de stockage</label>
                </div>
                <div class="service">
                    <a href="guest/ressources_guest.php"><img src="" alt="Réseau" id="reseau"></a>
                    <label for="reseau">Equipement réseau</label>
                </div>
            </div>
        </section>

    </main> -->

    <!-- <footer id="contact">
        <h1>Contact</h1>

        <span>Nos reseaux sociaux</span>
        <ul class="reseaux">
            
            <li id="logoInsta"><a href="https://www.instagram.com"><img src="images/instagram.jpeg" alt="Logo Instagram" width="50" height="50"></a></li>
            <li id="logoFb"><a href="https://www.facebook.com"><img src="images/facebook.jpeg" alt="Logo Facebook" width="50" height="50"></a></li>
            <li id="logoTik"><a href="https://www.tiktok.com"><img src="images/tikTok.jpeg" alt="Logo TikTok" width="50" height="50"></a></li>
            <li id="logoWatts"><a href="tel:+212660750696"><img src="images/whatsApp.jpeg" alt="Logo WhatsApp" width="50" height="50"></a></li>
        
        <p id="contactLink"><a href="mailto:contact@datacenter.ma">contact@datacenter.ma</a></p>
        <p>&copy; 2024 Data Center. Tous droits réservés.</p>

    </footer> -->

</body>

</html>