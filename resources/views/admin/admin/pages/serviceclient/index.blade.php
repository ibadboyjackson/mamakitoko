@extends('admin.admin.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Liste des Commandes</h4>
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
                        <h4 class="card-title">Commandes des Clients</h4>
                    </div>
                    @include('admin.admin.messages')
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Nom</th>
                                <th class="border-top-0">Prénom</th>
                                <th class="border-top-0">Emails</th>
                                <th class="border-top-0">Adresse</th>
                                <th class="border-top-0">Date de commande</th>
                                <th class="border-top-0">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td class="txt-oflo">{{ $client->id }}</td>
                                    <td class="txt-oflo">{{ $client->nom }}</td>
                                    <td class="txt-oflo">{{ $client->prenom }}</td>
                                    <td class="txt-oflo">{{ $client->email }}</td>
                                    <td class="txt-oflo">{{ $client->adresse_1 }}</td>
                                    <td class="txt-oflo">{{ date('j M, Y H:i',strtotime($client->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.customer.show', $client->id) }}"><button class="btn btn-success">Afficher</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($paypal as $paypals)
                                <tr>
                                    <td class="txt-oflo">{{ $paypals->id }}</td>
                                    <td class="txt-oflo">{{ $paypals->name }}</td>
                                    <td class="txt-oflo">{{ $paypals->lastName }}</td>
                                    <td class="txt-oflo">{{ $paypals->email }}</td>
                                    <td class="txt-oflo">{{ $paypals->address_1 }}</td>
                                    <td class="txt-oflo">{{ date('j M, Y H:i',strtotime($paypals->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.customer.edit', $paypals->id) }}"><button class="btn btn-success">Afficher</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
