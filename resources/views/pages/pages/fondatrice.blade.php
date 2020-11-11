<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fondatrice | Mama Kitoko</title>

    <!-- Bootstrap core CSS -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font/fontawesome-free/css/all.css') }}">


    <!-- Custom styles for this template -->
    <link href="css/resume.css" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="/">
        <span class="d-block d-lg-none">Corinne Kamdem</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ asset('img/team/profile.png') }}" alt="">
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">A propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#skills">Compétences</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#interests">Interets</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid p-0">
@foreach($fondatrice as $fondatrices)
    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
            <a href="/"><img src="{{ asset('img/logos/logos.png') }}" alt="" class="img-fluid my-5" title="retour sur le site"></a>
            <h1 class="mb-0">{{ $fondatrices->prenom }}
                <span class="text-primary">{{ $fondatrices->nom }}</span>
            </h1>
            <div class="subheading mb-5">{{ $fondatrices->adresse }} {{ $fondatrices->telephone }}
                <a href="mailto:name@email.com">{{ $fondatrices->email }}</a>
            </div>
            <p class="lead mb-5">{!! $fondatrices->description !!}</p>
            <div class="social-icons">
                <a href="https://www.youtube.com/channel/UCxPgNRwt2ZcudI8vJFKI4OQ" target="_blank">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://www.instagram.com/corinne_kamdem/" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://twitter.com/KitokoMama/media" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.facebook.com/Mama-Kitoko-1691586500969612/" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
        </div>
    </section>
    <hr class="m-0">
    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
            <h2 class="mb-2">Experience</h2>
            <div class="resume-item d-flex flex-column flex-md-row mb-5">
                <div class="resume-content mr-auto">
                    <p>{!! $fondatrices->experience !!}.</p>
                </div>
            </div>
        </div>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
            <h2 class="mb-5">Compétences</h2>
            <div class="subheading mb-3">{!! $fondatrices->competences !!}</div>
        </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="resume-content my-auto">
            <h2 class="mb-2">Interets</h2>
            <p>{!! $fondatrices->interet !!}.</p>
        </div>
    </section>

    <hr class="m-0">

@endforeach
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/resume.js"></script>

</body>

</html>
