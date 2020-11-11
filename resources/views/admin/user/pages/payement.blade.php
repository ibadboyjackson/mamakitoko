<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paymentfont/1.2.5/css/paymentfont.min.css">
    <title>Payement</title>
    <style>
        * {
            font-family: "Helvetica Neue", Helvetica;
            font-size: 15px;
            font-variant: normal;
            padding: 0;
            margin: 0;
        }

        html {
            height: 100%;
        }

        body {
            background: #E6EBF1;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100%;
        }

        form {
            width: 480px;
            margin: 20px 0;
        }

        .group {
            background: white;
            box-shadow: 0 7px 14px 0 rgba(49, 49, 93, 0.10), 0 3px 6px 0 rgba(0, 0, 0, 0.08);
            border-radius: 4px;
            margin-bottom: 20px;
        }

        label {
            position: relative;
            color: #8898AA;
            font-weight: 300;
            height: 40px;
            line-height: 40px;
            margin-left: 20px;
            display: flex;
            flex-direction: row;
        }

        .group label:not(:last-child) {
            border-bottom: 1px solid #F0F5FA;
        }

        label > span {
            width: 120px;
            text-align: right;
            margin-right: 30px;
        }

        label > span.brand {
            width: 30px;
        }

        .field {
            background: transparent;
            font-weight: 300;
            border: 0;
            color: #31325F;
            outline: none;
            flex: 1;
            padding-right: 10px;
            padding-left: 10px;
            cursor: text;
        }

        .field::-webkit-input-placeholder {
            color: #CFD7E0;
        }

        .field::-moz-placeholder {
            color: #CFD7E0;
        }

        button {
            float: left;
            display: block;
            background: #666EE8;
            color: white;
            box-shadow: 0 7px 14px 0 rgba(49, 49, 93, 0.10), 0 3px 6px 0 rgba(0, 0, 0, 0.08);
            border-radius: 4px;
            border: 0;
            margin-top: 20px;
            font-size: 15px;
            font-weight: 400;
            width: 100%;
            height: 40px;
            line-height: 38px;
            outline: none;
        }

        button:focus {
            background: #555ABF;
        }

        button:active {
            background: #43458B;
        }

        .outcome {
            float: left;
            width: 100%;
            padding-top: 8px;
            min-height: 24px;
            text-align: center;
        }
        .success,
        .error {
            display: none;
            font-size: 13px;
        }

        .success.visible,
        .error.visible {
            display: inline;
        }

        .error {
            color: #E4584C;
        }

        .success {
            color: #666EE8;
        }

        .success .token {
            font-weight: 500;
            font-size: 13px;
        }
        .graph h1{
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="graph">
</div>
@if(Auth::user()->cotisation->toArray() == [])
    <form action="{{ route('dashboard.store') }}" method="POST">
        @csrf
        <input type="hidden" name="token" />
        <div class="group">
            <label>
                <span>Card number</span>
                <div id="card-number-element" class="field"></div>
                <span class="brand"><i class="pf pf-credit-card" id="brand-icon"></i></span>
            </label>
            <label>
                <span>Date d'expiration</span>
                <div id="card-expiry-element" class="field"></div>
            </label>
            <label>
                <span>Code de Sécurité</span>
                <div id="card-cvc-element" class="field"></div>
            </label>
            <label>
                <span>Code Postal</span>
                <input id="postal-code" name="postal_code" class="field" placeholder="90210" />
            </label>
        </div>
        <button type="submit">Cotiser 181 Euros</button>
        <div class="outcome">
            <div class="error">
                @include('admin.user.messages')
            </div>
            <div class="success">
                Success! Your Stripe token is
            </div>
        </div>
    </form>
@else
    <h1>Vous avez déjà cotiser</h1>&nbsp;
    <a href="{{ route('dashboard.index') }}">Retour</a>
@endif
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/stripe.js') }}"></script>
</body>
</html>
