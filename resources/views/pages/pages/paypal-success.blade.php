@extends('pages.template')
@section('title')
    Approved | Mama Kitoko
@stop
@section('content')
    @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif
    <section class="panier">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12 text-center">
                    <h1>Votre Commande</h1>
                    <table class="table my-5">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Articles</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($panier->items as $paniers)
                            <tr>
                                <td>{{ $paniers->name }}</td>
                                <td>
                                    <span class="badge badge-dark">{{ $paniers->quantity }}</span>&nbsp;&nbsp;&nbsp;
                                </td>
                                <td>€{{ $paniers->price * $paniers->quantity}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td scope="col"><strong style="color: #52b21b">TOTAL PAYE</strong></td>
                            <td>
                                <strong style="color: #52b21b">€{{ $paypal->amount}} Euro</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="jumbotron">
                        <h3>Details Client :</h3>
                        Nom : &nbsp; &nbsp;<strong>{{ $paypal->name }}</strong><br>
                        Prénom: &nbsp;&nbsp;<strong>{{ $paypal->lastName }}</strong><br>
                        email: &nbsp;&nbsp;<strong>{{ $paypal->email }}</strong><br>
                        Adresse: &nbsp;&nbsp;<strong>{{ $paypal->adresse_1 }}</strong><br>
                        Pays: &nbsp;&nbsp;<strong>{{ $paypal->country_code }}</strong><br>
                        Ville: &nbsp;&nbsp;<strong>{{ $paypal->city }}</strong><br>
                        Date de Commande: &nbsp;&nbsp;<strong> {{  date('j M, Y H:i',strtotime($paypal->created_at)) }}</strong>
                        <br>
                        <hr>
                        <p>
                            <strong>NB :</strong> La livraison doit se faire dans moins de 48 heures, Nous allons vous contacter en cas de besoin
                        </p>
                        <p>Si après ce delai vous n'avez pas réçu votre commande contacter le service client : Ici <a
                                href="">Service Client</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
