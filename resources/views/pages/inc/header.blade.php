<!-- HEADER PAGE -->
<header class="main-header">
    <!-- NAVIGATION -->
    <div class="main-menu">
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
                <a href="/" class="navbar-brand"> <img src="{{ asset('img/logos/logos.png') }}" alt="" class="img-fluid"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fas fa-bars"></i>
                        </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a href="/apropos" class="nav-link active">A Propos</a></li>
                        <li class="nav-item"><a href="/fondatrice" class="nav-link">La Fondatrice</a></li>
                        <li class="nav-item"><a href="/membres" class="nav-link">Nos Membres</a></li>
                        <li class="nav-item"><a href="/event" class="nav-link">Events</a></li>
                        <li class="nav-item"><a href="/news" class="nav-link">News et Médias</a></li>
                        <li class="nav-item">
                            <a href="/shop" class="nav-link">
                                Shop
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('panier') }}" class="nav-link">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="badge badge-dark">{{ Session::has('panier') ? Session::get('panier')->totalQty : '' }}</span>
                            </a>
                        </li>
                    </ul>
                    </ul>
                    @guest
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a href="inscription" class="nav-link">S'inscrire/Se connecter</a></li>
                        </ul>
                    @else
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a href="inscription" class="nav-link">Tableau de Bord</a></li>
                        </ul>
                    @endguest
                </div>
            </div>
        </nav> <!-- END NAVIGATION -->
    </div>
</header> <!-- END HEADER -->
