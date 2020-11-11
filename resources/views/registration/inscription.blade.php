<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mama Kitoko | Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <!-- MATERIAL DESIGN ICONIC FONT -->

    <!-- STYLE CSS -->
        <link rel="stylesheet" href="{{ asset('register/css/main.css') }}">
    <script
        src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_API_KEY') }}">
    </script>
</head>

<body>
<div class="wrapper" style="background-image: url('register/images/bg-registration-form-1.jpg');">
    <div class="inner">
        <div class="image-holder">
            <a href="/" title="Retour sur le site"><img src="{{ asset('register/images/registration-form-1.jpg') }}" alt=""></a>
        </div>
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('registration.messages')
            <h3>Inscription</h3>
            <div class="form-group">
                <input type="text" placeholder="Nom" name="name" class="form-control">
                <input type="text" placeholder="Prénom" name="lastname" class="form-control">
            </div>
            <div class="form-wrapper">
                <input type="text" placeholder="Nom d'utilisteur" name="username" class="form-control">
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="form-wrapper">
                <input type="text" placeholder="Adresse Email" name="email" class="form-control">
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <label for="img">Photo</label>
                <input type="file" placeholder="Photo" class="form-control" name="image">
                <i class="zmdi zmdi-image"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" placeholder="Mot de passe" class="form-control" name="password">
                <i class="zmdi zmdi-lock"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" placeholder="Confirmer votre mot de passe" class="form-control" name="password_confirmation">
                <i class="zmdi zmdi-lock"></i>
            </div>
            <div id="paypal-button-container"></div>
            <div class="txt">Vous avez déjà un compte ? <a href="connexion">Se connecter</a></div>
        </form>
    </div>
</div>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            // Set up the transaction
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        currency_code: 'USD',
                        value: '0.01'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
                // Call your server to save the transaction
                return fetch('https://test.mamakitoko.com/paypalvalider', {
                    method: 'post',
                    body: JSON.stringify({
                        orderID: data.orderID
                    })
                });
            });
        }
    }).render('#paypal-button-container');
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
