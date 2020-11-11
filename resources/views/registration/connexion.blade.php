<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mama Kitoko | Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- MATERIAL DESIGN ICONIC FONT -->

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('register/css/main.css') }}">
</head>

<body>
<div class="wrapper" style="background-image: url('register/images/bg-registration-form-1.jpg');">
    <div class="inner">
        <div class="image-holder">
            <a href="/" title="Retour sur le site"><img src="{{ asset('register/images/registration-form-1.jpg') }}" alt=""></a>
        </div>
        <form action="{{ route('connexion') }}" method="POST">
            @csrf
            @include('registration.messages')
            <h3>Connexion</h3>
            <div class="form-wrapper">
                <input type="text" placeholder="Email" name="email" class="form-control">
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" placeholder="Mot de passe" name="password" class="form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>
            <div class="form-wrapper">
                <label for="remember" style="margin-top: 13px">Se souvenir de moi</label>
                <input type="checkbox" name="remember" style="margin-top: 12px">
            </div>
            <button type="submit">Se connecter
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
            <div class="txt">Mot de passe oublié ? <a href="{{ route('password.request') }}">Reinitiliser</a></div>

        </form>
    </div>
</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
