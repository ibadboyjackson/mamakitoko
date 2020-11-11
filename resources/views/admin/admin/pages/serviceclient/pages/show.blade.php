@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Commande Client</h4>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
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
                            Telephone: &nbsp;&nbsp;<strong>{{ $client->telephone }}</strong><br>
                            Date de Commande: &nbsp;&nbsp;<strong> {{  date('j M, Y H:i',strtotime($client->created_at)) }}</strong>
                            <br>
                            <hr>
                            <p>
                                <strong>NB :</strong> Une fois que vous allez livrer cette commande, vous pourrez la supprimer Ici
                                <br>
                                <br>
                                <form action="{{ route('admin.customer.destroy', $client->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary btn-lg" type="submit">Supprimer</button>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->

    </div>

@stop
