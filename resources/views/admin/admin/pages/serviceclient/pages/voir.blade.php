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
                                    <strong style="color: #52b21b">€{{ $customer->amount}} Euro</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="jumbotron">
                            <h3>Details Client :</h3>
                            Nom : &nbsp; &nbsp;<strong>{{ $customer->name }}</strong><br>
                            Prénom: &nbsp;&nbsp;<strong>{{ $customer->lastName }}</strong><br>
                            email: &nbsp;&nbsp;<strong>{{ $customer->email }}</strong><br>
                            Adresse: &nbsp;&nbsp;<strong>{{ $customer->address_1 }}</strong><br>
                            Pays: &nbsp;&nbsp;<strong>{{ $customer->country_code }}</strong><br>
                            Ville: &nbsp;&nbsp;<strong>{{ $customer->city }}</strong><br>
                            Date de Commande: &nbsp;&nbsp;<strong> {{  date('j M, Y H:i',strtotime($customer->created_at)) }}</strong>
                            <br>
                            <hr>
                            <p>
                                <strong>NB :</strong> Une fois que vous allez livrer cette commande, vous pourrez la supprimer Ici
                                <br>
                                <br>
                            <form action="{{ route('admin.client.destroy', $customer->id) }}" method="post">
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
