<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
    <title>Payement | Mama Kitoko</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('libs/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('libs/form-validation.css') }}" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('img/logos/logos.png') }}" alt="" width="231" height="51">
        <h2>Formulaire de Commande</h2>
        <p class="lead"></p>
    </div>
    @if(Session::has('errors'))
        <div class="alert alert-danger">
            <strong>Corriger les erreurs suivantes :</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Votre Panier</span>
                <span class="badge badge-secondary badge-pill"> {{ Session::get('panier')->totalQty }} </span>
            </h4>
            <ul class="list-group mb-3">
                @foreach($shops as $shop)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $shop['item']['titre']}}</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">€{{ $shop['item']['prix']* $shop['qty'] }} Euro</span>
                    </li>
                @endforeach


                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Code Promo</h6>
                        <small>EXAMPLECODE</small>
                    </div>
                    <span class="text-success">-5€</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (Euro)</span>
                    <strong>€{{ $totalPrice }} Euro</strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Code promo">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Appliquer</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Adresse de Facturation</h4>
            <form class="needs-validation" novalidate  id="payment-form" action="{{ route('post.payments') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nom</label>
                        <input type="text" class="form-control StripeElement StripeElement--empty" id="firstName" name="nom" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Un nom valide est requis.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Prénom</label>
                        <input type="text" class="form-control StripeElement StripeElement--empty" id="lastName" placeholder="" name="prenom" value="" required>
                        <div class="invalid-feedback">
                            Un prénom valide est requis..
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Nom d'utilisateur</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control StripeElement StripeElement--empty" name="username" id="Nom d'utilisateur" placeholder="Nom d'utilisateur" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Un nom d'utilisateur valide est requis..
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Adresse mail <span class="text-muted">(Optional)</span></label>
                    <input type="email" name="email" class="form-control StripeElement StripeElement--empty" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        S'il vous plaît entrer une adresse email valide pour les mises à jour d'expédition.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Addresse Ligne 1</label>
                    <input type="text" class="form-control StripeElement StripeElement--empty" name="adresse_1" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                        Prière d'indiquer votre adresse d'expédition
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">Addresse Ligne 2 <span class="text-muted">(Optionnel)</span></label>
                    <input type="text" class="form-control" name="adresse_2" id="address2" placeholder="Appartement ou suite">
                </div>
                <div class="mb-3">
                    <label for="address2">Numéro de téléphone</label>
                    <input type="text" class="form-control" name="telephone" id="address2" placeholder="+41 75 411 xx xx">
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Pays</label>
                        <select class="custom-select d-block w-100 StripeElement StripeElement--empty" id="country" name="pays" required>
                            <option value="">Choisir...</option>
                            <option>Suisse</option>
                        </select>
                        <div class="invalid-feedback">
                            Veuillez sélectionner un pays valide.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">Ville</label>
                        <select class="custom-select d-block w-100 StripeElement StripeElement--empty" id="state" name="ville" required>
                            <option value="">Choisir...</option>
                            <option>Génève</option>
                        </select>
                        <div class="invalid-feedback">
                            Veuillez sélectionner une ville valide.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Code Postal</label>
                        <input type="text" class="form-control StripeElement StripeElement--empty" name="zip" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                            Code postal requis.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">L'adresse de livraison est la même que mon adresse de facturation</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Sauvegarder cette information pour la prochaine fois</label>
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="credit">Carte de Crédit</label>
                    </div>
                </div>
                <div class="form-row" style="display: block">
                    <div id="card-element" class="form-control">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>
                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert" style="color: red"></div>
                    <button>Continuer et Payer</button>
                </div>
                <hr class="mb-4">
                <br>
                <br>
                <br>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2018-2019 Mama Kitoko</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Service Client</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Contact</a></li>
        </ul>
    </footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/jquery-slim.min.js') }}"><\/script>')</script>
<script src="{{ asset('libs/js/popper.min.js') }}"></script>
<script src="{{ asset('libs/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('libs/js/holder.min.js') }}"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/payment.js') }}"></script>
</body>
</html>
