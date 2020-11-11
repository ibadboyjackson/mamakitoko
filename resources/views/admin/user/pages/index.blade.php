@extends('admin.user.dashboard')
@section('title')
    Cotisation | Mama Kitoko
@stop
@section('content')
            @if($user->toArray() == [])
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            @include('admin.user.messages')
                            <h4 class="page-title">Profile</h4>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-30"> <img src="{{ asset("images/") }}/{{ Auth::user()->image }}" class="rounded-circle" width="150" />
                                        <h4 class="card-title m-t-10">{{ Auth::user()->username}}  {{ Auth::user()->lastname }}</h4>
                                        <h6 class="card-subtitle">{{ Auth::user()->email }}</h6>
                                    </center>
                                </div>
                                <div>
                                    <hr>
                                </div>
                                <div class="card-body"> <small class="text-muted"></small>
                                    <h2 class="justify-content-center text-center">Information</h2>
                                    <p class="text-center">Votre inscription a été confirmé mais il vous reste à cotiser, si vous ne le faites dans 24 heures ce compte sera supprimé</p>
                                    <br>
                                    <div>
                                        <hr>
                                    </div>
                                    <p class="text-center"><strong>NB:</strong> Les informations sur cette page sont confidentielles et cryptés.</p>
                                    <br>
                                    <div>
                                        <hr>
                                    </div>
                                    <br>
                                    <p class="text-center"><strong>Montant à cotiser:</strong> &nbsp;<strong class="alert alert-success">181 euros</strong> </p>
                                    <br>
                                    <div>
                                        <hr>
                                    </div>
                                    <br>
                                    <button class="btn-secondary" style="background-color: transparent; border-color: transparent"><img src="{{ asset('img/master.png') }}" alt="" width="60" height="40"></button>
                                    <button class="btn-secondary" style="background-color: transparent; border-color: transparent"><img src="{{ asset('img/visa.png') }}" alt="" width="60" height="40"></button>
                                    <button class="btn-secondary" style="background-color: transparent; border-color: transparent"><img src="{{ asset('img/express.png') }}" alt="" width="60" height="60"></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="">Votre Nom</label>
                                            <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Votre Prénom</label>
                                            <input type="text" value="{{ Auth::user()->lastname }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Votre Adresse</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Numéro de téléphone</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ville</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pays</label>
                                            <input type="text" class="form-control" value="Suisse">
                                        </div>
                                    </form>
                                    <a href="{{ route('payment') }}" class="btn btn-success btn-lg">Cotiser</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            @else
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            @include('admin.user.messages')
                            <h4 class="page-title">Liste des Cotisations</h4>
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
                                    <h4 class="card-title">Mes Cotisations</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">Montant</th>
                                            <th class="border-top-0">NOM</th>
                                            <th class="border-top-0">PRENOM</th>
                                            <th class="border-top-0">EMAIL</th>
                                            <th class="border-top-0">DATE DE COTISATION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(Auth::user()->cotisation as $cotisation)
                                            <tr>
                                                <td class="txt-oflo">181 euros</td>
                                                <td class="txt-oflo">{{ $cotisation->name }}</td>
                                                <td><span class="">{{ $cotisation->username }}</span> </td>
                                                <td><span class="">{{ Auth::user()->email }}</span> </td>
                                                <td class="txt-oflo">{{ date('j M, Y H:i',strtotime($cotisation->created_at)) }}</td>
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
            @endif
@stop
