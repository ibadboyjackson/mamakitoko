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
                                <td>
                                    <img src="{{ asset("img/") }}/{{$paniers['item']['image']}}" alt="" class="img-fluid" width="80"> &nbsp;
                                    <a href="">{{ $paniers['item']['titre'] }}</a>
                                </td>
                                <td>
                                    <span class="badge badge-dark">{{ $paniers['qty'] }}</span>&nbsp;&nbsp;&nbsp;
                                </td>
                                <td scope="col">
                                    €{{ $paniers['item']['prix'] * $paniers['qty']}} Euro
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td scope="col"><strong style="color: #52b21b">TOTAL PAYE</strong></td>
                            <td>
                                <strong style="color: #52b21b">€{{ $client->montant/100 }} Euro</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="jumbotron">
                        <h3>Details Client :</h3>
                        Nom : &nbsp; &nbsp;<strong>{{ $client->nom }}</strong><br>
                        Prénom: &nbsp;&nbsp;<strong>{{ $client->prenom }}</strong><br>
                        email: &nbsp;&nbsp;<strong>{{ $client->email }}</strong><br>
                        Adresse: &nbsp;&nbsp;<strong>{{ $client->adresse_1 }}</strong><br>
                        Pays: &nbsp;&nbsp;<strong>{{ $client->pays }}</strong><br>
                        Ville: &nbsp;&nbsp;<strong>{{ $client->ville }}</strong><br>
                        Téléphone: &nbsp;&nbsp;<strong>{{ $client->telephone }}</strong><br>
                        Date de Commande: &nbsp;&nbsp;<strong> {{  date('j M, Y H:i',strtotime($client->created_at)) }}</strong>
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
