<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mama Kitoko | Se desabonner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

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
        <form action="" method="POST">
            @csrf
            @include('registration.messages')
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h3>Se desabonner de la newsletter</h3>
            <div class="form-wrapper">
                <input type="hidden" placeholder="Entrer votre adresse mail" name="email" class="form-control">
                <i class="zmdi zmdi-account"></i>
            </div>
            <button type="submit">Se desabonner
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
        </form>
    </div>
</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
